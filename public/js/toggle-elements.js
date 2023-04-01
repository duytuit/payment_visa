function hideElementes(input) {
    $(input)
        .removeClass('fake-parsley-success')
        .prop('required', false)
        .prop('disabled', true)
        .closest('.js-form-group')
        .addClass('hide');

    switch ($(input).prop('type')) {
    case 'radio':
    case 'checkbox':
        var is_checked = ($(input).data('default') == $(input).val());
        $(input)
            .prop('checked', is_checked)
            .trigger('change', true);
        break;
    case 'select-one':
        $(input).parent().removeClass('fake-parsley-success');
        // Check if element has default value and validate it automatically on show/hide.
        if ($(input).data('required')) {
            var defaultValue = ($(input).data('default')) ? $(input).data('default') : null;
            if(defaultValue) {
                $(input).val(defaultValue).trigger('change', true);
            } else {
                $(input).val('').trigger('change', true);
            }
        } else {
            $(input).val(null).trigger('change', true);
        }
        break;
    case 'select-multiple':
        // Empty and refresh select-multiple when show/hide.
        if ($(input).data('required'))
            $(input).val('').trigger('change', true);
        else
            $(input).val(null).trigger('change', true);
        break;
    default:
        if ($(input).data('required')) {
            if (typeof appStored !== 'undefined' && (!appStored || appStored == 0)) {
                $(input).val('');
            } else {
                $(input).val('').trigger('change', true);
            }
        } else {
            $(input).val('').trigger('change', true);
        }
    }
}

function showElementes(input) {
    input.closest('.js-form-group').removeClass('hide');
    if ($(input).data('disable') && getValueFromField($(input).data('disable'))) {
        return;
    }
    if (!$(input).data('disabled')) {
        $(input).prop('disabled', false);
    } else {
        $(input).prop('disabled', true);
    }
    if ($(input).hasClass('datepicker')) {
        $(input).next('[type=hidden].j-form-hiden').prop('disabled', false);
    }
    if ($(input).data('required')) {
        $(input).prop('required', true);
    }
}

function hideRelatedElementes(element) {
    $('*[data-source=' + element.id + ']').each(function() {
        hideElementes(this);
        const input = $(this);
        hideRelatedElementes({
            id: $(input).data('id'),
            value: input.val()
        });
    });
}

function isJson(str) {
    try {
        const strParsed = JSON.parse(str);
        if (typeof strParsed === 'number') {
            return false;
        }
    } catch (e) {
        return false;
    }
    return true;
}

function toggleElement(element) {
    const dataId = element.id;
    const elementChildren = $('[data-source*=\'' + dataId + '\']');

    elementChildren.each(function(elementIndex, elementChild) {
        const sources = $(elementChild).data('source').split(',');
        const srcValues = ($(elementChild).data('srcvalue') === null || $(elementChild).data('srcvalue') === undefined) ? true : $(elementChild).data('srcvalue');
        const placeholders = $(elementChild).data('placeholder');  
        var show = true;

        for (var index = 0; index < sources.length; index++) {
            if (Array.isArray(srcValues[index])) {
                // Check if sourceValue array has any value with negation.
                var sourceHasNegations = srcValues[index].filter(function(val) {
                    return new RegExp(/!\w+/).test(val);
                });
                var sourceIncludesValue = srcValues[index].includes(getValueFromField(sources[index]));
                var sourceIncludesValueWithNot = srcValues[index].includes('!'.concat(getValueFromField(sources[index])));
                
                if (!sourceIncludesValue && sourceHasNegations.length <= 0) {
                    show = false;
                    break;
                } else if(sourceIncludesValueWithNot  && sourceHasNegations.length > 0) {
                    show = false;
                    break;
                }
            } else if (isJson(srcValues[index])) {
                var val = null;
                if ($(elementChild).data('source-attr')) {
                    var elem = ($('*[id="' + sources[index] + '_id"]') && $('*[id="' + sources[index] + '_id"]').hasClass('datepicker'))
                        ? $('*[id="' + sources[index] + '_id"]') // Caso si es datepicker
                        : $('[name="' + sources[index] + '"]');
                    val = elem.attr($(elementChild).data('source-attr')[index]);
                } else {
                    val = getValueFromField(sources[index]);
                }
                // Esta linea es necesaria para IExplorer
                var obj = (typeof JSON.parse(srcValues[index]) !== 'object') ? [JSON.parse(srcValues[index])] : JSON.parse(srcValues[index]);
                if (Object.keys(obj).indexOf(val) <= -1 && srcValues[index] !== val) {
                    show = false;
                    break;
                }
            } else if ((getFieldType(sources[index]) !== 'radio' && getValueFromField(sources[index]) === srcValues[index])
                || $('[id="radio-' + sources[index] + '-' + srcValues[index] + '"]').is(':checked')) {
                continue;
            } else {
                // If condition value starts with '!' means element will show EXCEPT for this value.
                var sourceStartsWithNot = srcValues[index].indexOf('!')===0;
                var sourceValue = sourceStartsWithNot ? srcValues[index].substring(1) : srcValues[index];
                var fieldValue = getValueFromField(sources[index]);
                var sourceIsSameAsField = sourceValue === fieldValue;
                show = (sourceStartsWithNot && !sourceIsSameAsField && fieldValue.length > 0);
                break;
            }

            // Obtiene y asigna el placeholder correspondiente a la opción. (Default: muestra el label).
            if(show && placeholders) {
                var newPlaceholder = Array.isArray(placeholders[index]) 
                    ? placeholders[index][srcValues[index].indexOf(getValueFromField(sources[index]))] 
                    : placeholders[index];
                $(elementChild).attr('placeholder', (newPlaceholder) ? newPlaceholder: $(elementChild).data('placeholder-default'));
            }
        }

        if (show) {
            var currentStep = elementChild.closest('.c-form--step');
            if ($(currentStep).hasClass('c-form--step__active') || $(currentStep).hasClass('c-form--step__checkOk') || $(currentStep).hasClass('c-form--step__anError')) {
                showElementes($(elementChild));
            }
        } else {
            hideElementes(elementChild);
            if (typeof(inputChange) === typeof(Function)) {
                inputChange(elementChild);
            }
            if ($(elementChild).data('function') == 'toggle-elements') {
                const childElement = {
                    id: $(elementChild).data('id'),
                    value: $(elementChild).val()
                };
                hideRelatedElementes(childElement);
            }
        }
    });
}

function getValueFromField(fieldId) {
    switch(getFieldType(fieldId)) {
    case 'select-one':
        return $('#' + fieldId + ' option:selected').val();
    case 'checkbox':
        return $('#' + fieldId).is(':checked');
    case 'radio':
        return $('input[name=' + fieldId + ']:checked').val();
    default:
        return $('#' + fieldId).val();
    }
}

function getFieldType(fieldId) {
    const elem = $('[name="' + fieldId + '"]');
    if (elem[0]) return elem[0].type;
    return elem.prop('type');
}

function toggleAllElements() {
    $('*[data-function="toggle-elements"]').each(function() {
        toggleElementTrigger(this);
    });
}

function activateOnChange() {
    $('*[data-function="toggle-elements"]').on('change', function(event, reloadEvent) {
        if (reloadEvent == false) return;
        toggleElementTrigger(this);
    });
}

function toggleElementTrigger(el) {
    const element = {
        id: $(el).data('id') || el.id,
        value: $(el).val()
    };

    const input = $(el);
    const inputType = $(input).attr('type');
    if (inputType == 'radio' || inputType == 'checkbox') {
        if ($(input).is(':checked')) {
            toggleElement(element);
        }
    } else {
        toggleElement(element);
    }
}

function te_Ready() {
    activateOnChange();
    toggleAllElements();
}

$(te_Ready);
