$( document ).ready(function() {

  // select 2
    $('select.select2').select2({
        language: 'en',
    });
    var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
    });

    allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
    // Vertically centered popup message based on height

    $('span.popup').each(function () {
        topHeight = ($(this).find('span').outerHeight() - 19) / 2;
        $(this).find('span').css('top', '-' + topHeight + 'px');
    });

    // Add class "active" when focus on datepicker input

    $(".date input").focus(function(){
        //$(this).parents(".form-group").removeClass("round");
        $(this).parents(".form-group").addClass("active");

    }).blur(function(){
        $(this).parents(".form-group").removeClass("active");
    })

    // Ends. Add class "active" when focus on datepicker input

    // check required attribute and add steric to label

    $('form input:not([type=radio], [type=checkbox]), form textarea, form select').each(function(){
        if(!$(this).prop('required')){
            //console.log("NR");
        } else {
            /*$(this).siblings('label').addClass('required');
            $(this).siblings('label').append( "<span>*</span>" );*/
            $(this).closest(".form-group").find('label').addClass('required');
            $(this).closest(".form-group").find('label').append( "<span>*</span>" );
        }
    });

    //same as above but js version

    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        allowInputToggle: true
    });

    /*$('.input-group-addon').keypress(function (e) {
        if (e.keyCode == 13) { // return[enter] key maps to keycode `13`
            //don't expand select dropdown if enter key is pressed
            //return false;

            $('#datetimepicker').datetimepicker({
                allowInputToggle: true
            });

        }
    });*/

    styleDropdowns();

});

// Styled Select

function styleDropdowns() {
    //this function called from outer master template's onPageReady function
    //to learn about jquery EasyDropdown follow this link
    //http://www.jqueryscript.net/demo/Easy-jQuery-Based-Drop-Down-Builder-EasyDropDown/
    $('.select-options').keypress(function (e) {
        if (e.keyCode == 13) { // return[enter] key maps to keycode `13`
            //don't expand select dropdown if enter key is pressed
            return false;
        }
    });
    //cutOff: 3,
    $('.select-options').easyDropDown({
        wrapperClass: 'dropdown',
        onChange: function (selected) {
            //console.log("Start");
            setDropDownSelectedIcon('false', selected.title);
            //filterTariffList();
        }
    });

    $('.select-options').parents('.select-wrap').addClass('bound');

    $('.dropdown ul li').each(function () {
        var li = $(this);
        var liVal = $(this).html().replace(/&amp;/g, '&').trim();
        $(this).parents().find('.dropdown select option').each(function () {
            var option = $(this);
            var optionText = $(this).text().trim();
            if (liVal == optionText) {
                if (option.data('type')) {
                    var options = option.data('type');
                    li.attr('data-type', options);
                }
                li.attr('data-val', $(this).val());
            }
        });
    });

    $('.dropdown').attr('tab-index', '0');

    setDropDownSelectedIcon(true, '');

    if ($('.dropdown').hasClass('touch')) {
        $('.select-options').addClass('touch');
    } else {
        $('.select-options').removeClass('touch');
    }
}

function setDropDownSelectedIcon(onlyActive, selectedTitle) {
    var selector = onlyActive ? '.active' : '';
    $('.dropdown ul li' + selector).each(function () {
        if (onlyActive)
            selectedTitle = $(this).text().trim();
        var attrVal = '';
        var myText = $(this).text().trim();
        if (myText == selectedTitle) {
            //get item whose text matched to selected text and then get its attribute value
            attrVal = $(this).attr('data-type');
            //get select items type class, it also have some extra classes
            var myClass = $('.dropdown ul li[data-type="' + attrVal + '"]').parents('.select-wrap').attr('class');
            //console.log(myClass);
            // so make a solid selector by replacing space with dot(.)
            //i.e "col-sm-4 select-wrap energy bound" becomes ".col-sm-4.select-wrap.energy.bound"
            myClass = myClass.replace(/ /g, '.');
            //console.log(myClass);
            //console.log(attrVal);
            $('.' + myClass + ' .selected').attr('data-type', attrVal);
        }
    });
}
//show image loading
function showLoading(){
    var xPos = $(window).width() / 2;
    xPos -= 45;
    $('#fade_loading').css('left', xPos + 'px');
    $("#fade_overlay").show();
}
// hidden image loading
function hideLoading(){
    $("#fade_overlay").hide();
}
