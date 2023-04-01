<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Info Visa</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="/css/easydropdown.css" rel="stylesheet">
    <link href="/wp/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wp/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/css/default.css?v={{ date('YmdHisss', time()) }}" rel="stylesheet">
    <link href="/css/application.css?v={{ date('YmdHisss', time()) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wp/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="fade_overlay"><img id="fade_loading" src="/images/shares/loadding.gif"/></div>
<br>
<main>
    <div class="container">
        <form id="valForm">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="nav-progress">
                <div class="active">
                    Register
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div>
                    Confirm Payment
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div>
                    Approval Confirmation
                </div>
            </div>
            <br>
            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Personal Details</h3>
                </div>
                <div class="c-form--step__container">
                    <div id="form-full_name" class="m-group data-form-input js-form-element div_full_name">
                        <label class="" for="full_name">Surname<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper">
                                <input type="text" dir="auto" id="full_name" name="full_name" placeholder="Surname" >
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Surname is also known as Last name or Family name.
                                    </li>
                                    <li>
                                        Enter ALL name(s) as they appear in your passport.
                                    </li>
                                    <li>
                                        If you have no Surname, enter Surname as UNKNOWN.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                        <span class="m-group-content--description">Enter your Surname exactly as shown in your passport.</span>
                    </div>
                    <div id="form-first_name" class="m-group data-form-input div_first_name">
                        <label class="" for="first_name">Given Name(s)<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper ">
                                <input type="text" id="first_name" name="first_name"
                                       placeholder="Given Name(s)" value="" >
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Please provide your Given Name(s) (also known as "First Name")
                                        exactly as shown in your passport or identity document.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                        <span class="m-group-content--description">Enter your Given Name(s) as shown in your passport.</span>
                    </div>
                    <div id="form-gender" class="m-group">
                        <label class="" for="gender">Gender<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__radio">
                                <input type="radio" id="radio-gender-1" class="radio-gender" name="sex"
                                       value="1">
                                <label for="radio-gender-1">Male</label>
                                <input type="radio" id="radio-gender-2" class="radio-gender" name="sex"
                                       value="2" >
                                <label for="radio-gender-2">Female</label>
                            </div>
                        </div>
                        <label id="error-gender" class="error"> </label>
                    </div>
                    <div id="form-date_of_birth"
                         class="m-group data-form-input js-form-element  birthday new_dateapicker">
                        <label class="" for="date_of_birth">Date of Birth<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__datepicker container-datepicker js-form-element-wrapper div_birthday">
                                <input id="date_of_birth_id" class="datetimepicker" name="birthday" placeholder="Date of Birth" type="text" value="" >
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>Select your date of birth, as it appears in your passport.</p>
                            </div>
                        </div>
                    </div>
                    <div id="form-country_of_birth" class="m-group data-form-input js-form-element div_nationality">
                        <label class="" for="country_of_birth">Country of Birth<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper ">
                                <select class="select-countries select2"  name="nationality" id="country_of_birth" >
                                    <option value="" selected>[Choose nationality]</option>
                                    @foreach ($current_nationality as $key =>  $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>
                                    Select the country where you were born from the list provided. If your
                                    country of birth is now known by another name, then select the country
                                    where the place where you were born is now located.</p></div>
                        </div>
                        <div class="message_zone"></div>
                    </div>
                    <div id="form-country_of_birth" class="m-group data-form-input js-form-element  ">
                        <label class="" for="country_of_birth">Country of Birth<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper div_nationality_at_birth">
                                <select class="select-countries select2"  name="nationality_at_birth" id="country_of_birth" required="" >
                                    @foreach ($current_nationality as $key =>  $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>
                                    Select the country where you were born from the list provided. If your
                                    country of birth is now known by another name, then select the country
                                    where the place where you were born is now located.</p></div>
                        </div>
                    </div>
                    <div class="m-group__actions m-group__full">
                        <a class="btnNext m-button m-button__primary" id="btnNext4" href="#next4">
                            Next        <!-- Button arrow. Color filled via scss -->
                        </a>
                    </div>
                </div>
            </section>
            <section class="c-form--step c-form--step__active">
                <div class="c-form--step__title">
                    <h3>Passport Details</h3>
                </div>
                <div class="c-form--step__container">
                    <span class="c-form--step__description">Provide details of the passport that you will use to travel. Enter these details exactly as they appear in your passport.</span>
                    <div id="form-passport_country" class="m-group data-form-input js-form-element div_country_of_passport">
                        <label class="" for="country_of_passport">Country of Passport<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper ">
                                <select class="select-countries select2" name="country_of_passport" id="country_of_passport">
                                    <option value="">Select a Country</option>
                                    @foreach ($current_nationality as $key =>  $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Please select the Country of the Passport you will travel with. It
                                        must be the same as your Country of Citizenship.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                    </div>
                    <div id="form-passport_number" class="m-group data-form-input js-form-element div_passport_number">
                        <label class="" for="passport_number">Passport Number<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper ">
                                <input type="text" id="passport_number" name="passport_number"
                                       placeholder="Passport Number" class="">

                            </div>
                        </div>
                        <div class="message_zone"></div>
                        <span class="m-group-content--description">Enter the Passport Number exactly as it appears on the biographic information page. Pay particular attention to the letter O and the number 0; and the letter I and the number 1.</span>
                    </div>
                    <div id="form-passport_issue" class="m-group data-form-input js-form-element  js-passportIssue div_intended_date_of_entry">
                        <label class="" for="passport_issue">Passport Issue Date<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__datepicker container-datepicker js-form-element-wrapper">
                                <input id="passport_issue_id" class="datetimepicker" name="intended_date_of_entry" placeholder="Passport Issue Date" type="text" value="" >
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        The Issue Date can be found on your Passport or travel document.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                    </div>
                    <div id="form-passport_expiry"
                         class="m-group data-form-input js-form-element  js-passportExpire new_dateapicker">
                        <label class="" for="passport_expiry">Passport Expiry Date<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div
                                class="m-group-content--input__datepicker container-datepicker js-form-element-wrapper div_expiry_date">
                                <input id="passport_expiry_id" class="datetimepicker" name="expiry_date" placeholder="Passport Expiry Date" type="text" value="" >
                                <i class="fa fa-calendar"></i>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        The Expiry Date can be found on your Passport or travel document.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-group__actions m-group__full">
                        <a class="btnNext m-button m-button__primary" id="btnNext4" href="#next4">
                            Next        <!-- Button arrow. Color filled via scss -->
                        </a>
                    </div>
                </div>

            </section>
            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Contact Details</h3>
                </div>
                <div class="c-form--step__container">

                    <div id="form-email" class="m-group data-form-input js-form-element div_email">
                        <label class="" for="email">Email Address<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper">
                                <input type="email" dir="auto" id="email" name="email" placeholder="Email Address"  class="" maxlength="70" required="">
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        You will receive an email that confirms the receipt of your Application at the
                                        Email Address you provide. You will also receive updates on the status of your
                                        Application.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                    </div>
                    <div id="form-confirm_email" class="m-group data-form-input js-form-element  ">
                        <label class="" for="confirm_email">Confirm Email Address<span
                                class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper div_confirm_email">
                                <input type="email" dir="auto" id="confirm_email" name="confirm_email"
                                       placeholder="Confirm Email Address" class="" maxlength="70"
                                       required="" >
                                <div class="message_zone"></div>
                            </div>
                        </div>
                    </div>
                    <div id="form-phone" class="m-group data-form-input js-form-element div_phone">
                        <label class="" for="phone">Mobile/Cell Telephone<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__prefix">
                                <div class="input-group">
                                      <span class="input-group-addon" style="padding: 0px 5px;">
                                    <select class="form-control select2" name="phone_code">
                                          @foreach ($list_phone_code as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                      </span>
                                    <input name="phone" type="tel" id="phone" placeholder="1234567890" value=""
                                           minlength="4" maxlength="20" class="">
                                </div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Please indicate a Mobile/Cell Telephone Number. It is important to indicate
                                        a
                                        correct phone number, since you may receive updates on the status of your
                                        Application. If you do not have a Telephone Number, you may provide an
                                        alternative third-party telephone number belonging to a point of contact.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                        <span class="m-group-content--description">Please select your country code and write your phone number without the country code</span>
                    </div>
                    <div class="m-group__actions m-group__full hide">
                        <a class="btnNext m-button m-button__primary" id="btnNext2">
                            Next
                        </a>
                    </div>
                </div>
            </section>

            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Accommodation Details during the trip</h3>
                </div>
                <div class="c-form--step__container">
                    <div id="form-accommodation_type" class="m-group data-form-input js-form-element  ">
                        <label class="" for="accommodation_type">Accommodation Type<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper div_purpose_of_entry">
                                <select class="" name="purpose_of_entry" id="accommodation_type"
                                        autocomplete="off">
                                    <option value="">
                                        Select
                                    </option>
                                    <option value="1">
                                        Home
                                    </option>
                                    <option value="2" selected="selected">
                                        Hotel
                                    </option>
                                    <option value="3">
                                        Villa
                                    </option>
                                    <option value="4">
                                        Apartment
                                    </option>
                                    <option value="5">
                                        Others
                                    </option>
                                </select>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>
                                    Please select the accommodation type that best describes where you will stay during
                                    your trip. </p>
                                <p>
                                    If you are staying in a different type of Accommodation, other than those mentioned,
                                    please select "Other". </p></div>
                        </div>
                    </div>
                    <div id="form-accommodation_address" class="m-group data-form-input js-form-element  ">
                        <label class="" for="accommodation_address">Address of Accommodation<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper div_address">
                                <input type="text" dir="auto" id="accommodation_address" name="address" placeholder="Address of Accommodation" class="" value="hà nội" maxlength="100" minlength="3">
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Please indicate the address of your accommodation or host. If you are staying on a cruise ship, please provide the name.    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="form-accommodation_province" class="m-group data-form-input js-form-element div_city_province">
                        <label class="" for="accommodation_province">Province of Accommodation<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input">
                                <select id="accommodation_province" autocomplete="off" name="city_province" class="" >
                                    <option value=""> Select an option </option>
                                    @foreach ($city_province as $key =>  $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>
                                    Please indicate the province of your accommodation or host's address. Please note that if you are staying on a cruise ship you must select the province to visit.</p>
                            </div>
                        </div>
                        <div class="message_zone"></div>
                    </div>
                    <div class="m-group__actions m-group__full">
                        <a class="btnNext m-button m-button__primary hide" id="btnNext4" href="#next4">
                            Next        <!-- Button arrow. Color filled via scss -->
                        </a>
                    </div>
                </div>
            </section>
            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Travel Details</h3>
                </div>
                <div class="c-form--step__container">
                    <div id="form-transport_type" class="m-group data-form-input js-form-element  ">
                        <label class="" for="transport_type">Type of Transport<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input js-form-element-wrapper div_passport_type">
                                <select class="" name="passport_type" id="transport_type" autocomplete="off">
                                    <option value="">
                                        Select
                                    </option>
                                    <option value="1" selected="selected">
                                        AIR
                                    </option>
                                    <option value="2">
                                        SEA
                                    </option>
                                    <option value="3">
                                        LAND
                                    </option>
                                </select>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>Please indicate your type of transport to Việt Nam.</p>
                            </div>
                        </div>
                    </div>
                    <div id="form-arrival_date" class="m-group data-form-input js-form-element  new_dateapicker">
                        <label class="" for="arrival_date">Intended Date of Entry<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__datepicker container-datepicker js-form-element-wrapper div_grant_visa_valid_from">
                                <input id="arrival_date_id" class="datetimepicker" name="grant_visa_valid_from" placeholder="Intended Date of Entry" type="text" value="" >
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <p>
                                    Please indicate the date you will enter the country.</p>
                            </div>
                        </div>
                    </div>
                    <div id="form-departure_date" class="m-group data-form-input js-form-element  new_dateapicker">
                        <label class="" for="departure_date">Intended Date of Exit<span class="m-group--required">&nbsp;*</span></label>
                        <div class="m-group-content">
                            <div class="m-group-content--input__datepicker container-datepicker js-form-element-wrapper div_grant_visa_valid_to">
                                <input id="departure_date_id" class="datetimepicker" name="grant_visa_valid_to" placeholder="Intended Date of Exit" type="text" value="" >
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <div class="message_zone"></div>
                            </div>
                            <div class="m-group-content--help">?</div>
                            <div class="m-group-content--help__container" style="display: none;">
                                <span class="close-button"></span>
                                <ul>
                                    <li>
                                        Please indicate the date of exit from Việt Nam.</li>
                                </ul>
                            </div>
                        </div>
                        <span class="m-group-content--description">The length of the stay should not exceed 90 days.</span>
                    </div>
                    <div id="form-travel_with_minors" class="m-group data-form-input js-form-element js-form-group  ">
                        <label class="" for="travel_with_minors"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Are you traveling with minors (under 18 years
                                    old)?</font></font><span class="m-group--required"><font
                                    style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;"></font></font></span></label>
                        <div class="m-group__actions m-group__full">
                            <a class="m-button m-button__primary" onclick="addChild()"  href="#next4">
                                Add Minor      <!-- Button arrow. Color filled via scss -->
                            </a>
                        </div>
                    </div>
                    <div class="m-group m-group-subtitle js-form-group m-group__full c-form--step__title" id="form-minor-information" data-source="number_of_children">
                        <label for="minor-information">Minor information</label>
                    </div>
                    <div class="add_child">
                        <div class="form-child1_passport_number m-group data-form-input js-form-element js-form-group u-marg--all0" style="width: 100%">
                            <label class="" for="child1_passport_number">Minor's Passport Number: <span class="m-group--required"><b></b></span></label>
                            <div class="m-group-content">
                                <div class="m-group-content--input js-form-element-wrapper">
                                    <input type="text" dir="auto" id="child1_passport_number" name="child_passport_number[]" placeholder="Minor's Passport Number" class="" value="" maxlength="20" >
                                </div>
                                <div>
                                    <a class="not-underline delete-progressive" onclick="delete_child(this)">
                                        <i class="fa fa-trash fa-fw text-danger" style="font-size: 30px;cursor: pointer"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="m-group-content--description">Please note that a separate application must be completed for minors under 18 years old.</span>
                        </div>
                    </div>
                    <div class="hide clone">
                        <div class="form-child1_passport_number m-group data-form-input js-form-element js-form-group u-marg--all0" style="width: 100%">
                            <label class="" for="child1_passport_number">Minor's Passport Number: <span class="m-group--required"><b></b></span></label>
                            <div class="m-group-content">
                                <div class="m-group-content--input js-form-element-wrapper">
                                    <input type="text" dir="auto" id="child1_passport_number" name="child_passport_number[]" placeholder="Minor's Passport Number" class="" value="" maxlength="20" >
                                </div>
                                <div>
                                    <a class="not-underline delete-progressive" onclick="delete_child(this)">
                                        <i class="fa fa-trash fa-fw text-danger" style="font-size: 30px;cursor: pointer"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="m-group-content--description">Please note that a separate application must be completed for minors under 18 years old.</span>
                        </div>
                    </div>
                    <div class="m-group__actions m-group__full">
                        <a class="btnNext m-button m-button__primary" id="btnNext3" href="#next3">
                            Next
                        </a>
                    </div>
                </div>
            </section>
            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Payment details </h3>
                </div>
                <div class="c-form--step__container">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-5 text_left">Amount USD:
                            </div>
                            <div class="col-sm-7">
                                <p >200 USD</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 text_left">Exchange Rate:</div>
                            <div class="col-sm-7">
                                <p>23,534</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 text_left">Amount VND:</div>
                            <div class="col-sm-7">
                                <p>4,706,800</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 text_left">Description:</div>
                            <div class="col-sm-7">
                                <p>E Visa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top:0">
                        <div class="form-group">
                            <div class="text_left" for="alowed_to_entry_throuth_checkpoint">
                                <div style="display: inline-flex">
                                    <input type="radio" value="1" id="radio_visa_master" style="margin:0" name="payment_alepay">
                                    <label style="font-weight: normal;margin-top: 3px;
                                       margin-left: 5px;" for="radio_visa_master"> Pay by Visa/Master</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text_left" for="alowed_to_entry_throuth_checkpoint">
                                <div style="display: inline-flex">
                                    <input type="radio" value="2" id="radio_installment" style="margin:0" name="payment_alepay">
                                    <label style="font-weight: normal;margin-top: 3px;
                                        margin-left: 5px;" for="radio_installment"> Pay installment</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text_left" for="alowed_to_entry_throuth_checkpoint">
                                <div style="display: inline-flex">
                                    <input type="radio" value="4" id="radio_atm_qrcode" style="margin:0" name="payment_alepay" checked="">
                                    <label style="font-weight: normal;margin-top: 3px;
                                        margin-left: 5px;" for="radio_atm_qrcode"> Pay by ATM / QR Code</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-group__actions m-group__full">
                    <a class="btnNext m-button m-button__primary" id="btnNext4" href="#next4">
                        Next        <!-- Button arrow. Color filled via scss -->
                    </a>
                </div>
            </section>
            <section class="c-form--step c-form--step__checkOk">
                <div class="c-form--step__title">
                    <h3>Declaration of Applicant</h3>
                </div>
                <div class="c-form--step__container">
                    <div id="form-declaration2" class="m-group data-form-input js-form-element m-group__full ">
                        <div class="m-group-content">
                            <div class="m-group-content--checkbox">
                                <input type="checkbox" class="parsley-success" id="declaration2" name="declaration2" value="1" >
                                <label class="checkbox-inline" for="declaration2">
                                    I declare that the information I have given in this application is truthful, complete and correct.
                                </label>
                            </div>
                        </div>
                        <label id="error-declaration2" class="error">
                        </label>
                    </div>
                    <div id="form-declaration1" class="m-group data-form-input js-form-element m-group__full accept">
                        <div class="m-group-content">
                            <div class="m-group-content--checkbox">
                                <input type="checkbox" class="parsley-success" id="declaration1" name="declaration1" value="1" >
                                <label class="checkbox-inline" for="declaration1">
                                    I have read and understood the <a href="#" data-toggle="modal" data-target="#termsAlert">Terms and Conditions</a>, and the <a href="#" data-toggle="modal" data-target="#privacyAlert">Privacy Policy</a>.
                                </label>
                            </div>
                        </div>
                        <label id="error-declaration1" class="error">
                        </label>
                    </div>
                </div>
                <div class="m-group__actions m-group__full">
                    <a class="btnNext m-button m-button__primary create_payment" id="btnNext4" href="#next4">
                        Next        <!-- Button arrow. Color filled via scss -->
                    </a>
                </div>
            </section>
        </form>
    </div>
</main>
<script>
    const SERVER_SIDE_VARS = {
        LANGUAGE: "en",
        LANGUAGE_ISO: "en_US",
        PRODUCT_TYPE: "vietnam",
        CURRENT_PAGE: "application",
        SERVICE_TEXT_STANDARD: "Standard processing time within 1 business day(s). In some cases it may take up to 2 business day(s)",
        SERVICE_TEXT_PRIORITY: "Priority processing within 1 hour(s).",
        PICKADATE_MONTH: "Month",
        PICKADATE_YEAR: "Year",
        PICKADATE_DAY: "Day",
        FIRST_VALID_DATE: "2023-03-29",
        LAST_VALID_DATE: "2026",
        ADDITIONAL_SERVICES: 'null',
        PROVIDER: '',
        SITE_URL: '',
        COUNTRY_OF_CITIZENSHIP: ''
    };
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/scripts.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/wp/bower_components/moment/moment.js"></script>
<script src="/wp/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/form-validation.js"></script>
<script src="/js/jquery.easydropdown.js"></script>
<script src="/wp/bower_components/select2/dist/js/select2.min.js"></script>
<script src="/js/main.js?v=3"></script>
<script src="{{ asset('wp/js/toastr.min.js') }}"></script>
<script>
    // document.getElementById('valForm').validateForm();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $('.prev_form').click(function (e) {
        previousForm(this);
    })
    function delete_child(event){
        $(event).parents(".form-child1_passport_number").remove();
    }
    function addChild(){
        var lsthmtl = $(".clone").html();
        $(".add_child").append(lsthmtl);
    }
    function removeMessageErrorCreate(create_label) {
        $(create_label).removeClass('has-error');
        if ($(create_label).find('.help-block').length) {
            $(create_label).find('.help-block').remove();
        }
    }
    function showErrorsCreate(errors, idCreate, classMessage) {
        $('div.form_create').find('.help-block').remove();
        $('div.form_create').find('.has-error').removeClass('has-error');
        $.each(errors, function(i, item) {
            var classCreate = idCreate + i.replace('.', '_');
            var create_label = $(classCreate);
            if (item != '') {
                removeMessageErrorCreate(classCreate);
                $(classCreate).addClass('has-error');
                $(classCreate).find(classMessage).append('<span class="help-block"><strong style="color: red">' +
                    item + '</strong></span>');
            } else {
                removeMessageErrorCreate(classCreate);
            }
        });
    }
    $('.create_payment').click(function (e) {
        e.preventDefault();
        showLoading();
        var form_data = new FormData($('#valForm')[0]);
        $.ajax({
            url: 'v2/transaction/payment',
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                hideLoading();
                if (response.status == true && response.data.checkoutUrl) {
                    window.location.href = response.data.checkoutUrl
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (response) {
                $(document).find('.has-error').removeClass('has-error');
                if ($(document).find('.help-block').length) {
                    $(document).find('.help-block').remove();
                }
                toastr.warning(response.responseJSON.message);
                showErrorsCreate(response.responseJSON.errors,'.div_', '.message_zone');
                hideLoading();
            }
        });
    });
    $('.next').click(function (e) {
        e.preventDefault();
        nextForm(this);
    });
    $('#clear_image').click(function (e) {
        e.preventDefault();
        $('#preview_img').attr('src', '{{ asset('images/noavatar_2x.jpeg') }}');
        $('#image_avatar').val('');
        $('#image_footer').val('')
    });
    $('#image_footer,#image_footer_passport').on('change', function (e) {
        let check = $(this).data('name');

        var form_data = new FormData();
        form_data.append('attach_file', e.target.files[0]);
        if (e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if (check == 'image_footer_passport') {
                    $('#preview_img_passport').attr('src', e.target.result);
                } else {
                    $('#preview_img_avatar').attr('src', e.target.result);
                }
            };
            reader.readAsDataURL(e.target.files[0]);
        }
        e.preventDefault();
        $.ajax({
            url: '/upload',
            processData: false,
            mimeType: "multipart/form-data",
            contentType: false,
            type: 'POST',
            data: form_data,
            success: function (response) {
                var get_response = JSON.parse(response);
                if (get_response.success == true) {
                    if (check == 'image_footer_passport') {
                        $('#image_passport').val(get_response.url);
                    } else {
                        $('#image_avatar').val(get_response.url);
                    }
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    function addImageChild(element) {
        let id_child = $(element).data('id_child');
        let file_child = element.files[0];
        if (file_child) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_img_avatar_child_' + id_child).attr('src', reader.result);
            };
            reader.readAsDataURL(file_child);

            var form_data = new FormData();
            form_data.append('attach_file', file_child);
            $.ajax({
                url: '/upload',
                processData: false,
                mimeType: "multipart/form-data",
                contentType: false,
                type: 'POST',
                data: form_data,
                success: function (response) {
                    var get_response = JSON.parse(response);
                    if (get_response.success == true) {
                        $('#image_avatar_child_' + id_child).val(get_response.url);
                    }
                },
                error: function (e) {
                    $('#preview_img_avatar_child_' + id_child).attr('src', '{{ asset('images/noavatar_2x.jpeg') }}');
                    console.log(e);
                }
            });
        }
    }

    var count = 1;
    $('.add_chilrent').click(function (e) {
        e.preventDefault();

        $('.list_child ._item_child').each(function () {
            $(this).find(".datetimepicker").datetimepicker({
                format: 'DD/MM/YYYY',
                allowInputToggle: true
            })
        })
    });
    $(".list_child").on("click", ".remove_item", function () {
        count -= 1;
        $(this).parents("._item_child").remove();
    });
    $('.reset_capcha').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/reset/captcha',
            type: 'GET',
            success: function (response) {
                if (response.success == true) {
                    $('.show_captcha').attr('src', response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (response) {
                toastr.error(response.responseJSON.message);
            }
        });
    });
    $(document).ready(function () {
        var data_info = window.localStorage.getItem("data_info");
        if (data_info && data_info != 'null') {

        } else {
            $('#step-1').show();
            $('#step-2').hide();
        }
    });
</script>
</body>
</html>
