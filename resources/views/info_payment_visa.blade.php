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
    <link href="/css/default.css?v=3" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wp/css/toastr.min.css') }}">  
</head>

<body>
    <div id="fade_overlay"><img id="fade_loading" src="/images/shares/loadding.gif"/></div>
    <!-- <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="text-center">Form Elements</h1>
                </div>
            </div>
        </div>
    </header> -->
    <hr>
    <main>
        <div class="container">

            <form id="valForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <ul id="progressbar">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
                <div class="row setup-content" id="step-1">
                    <h4>Fulfill foreigner’s information</h4>
                    <h5>Foreigner's images</h5>
                    <section>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="row text_left form-group" align="left"><span class="col-sm-12">Portrait photography<font color="red">*</font></span></div>
                                <div class="row" align="center">
                                    <input type="hidden" name="image_avatar" id="image_avatar">
                                    <input type="file" style="display: none" name="image_footer" data-name="image_footer" id="image_footer" class="form-control">
                                    <label for="image_footer">  <img id="preview_img_avatar" src="{{ asset('images/noavatar_2x.jpeg') }}" height="190"/></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row text_left form-group" align="left"><span class="col-sm-12">Passport data page image<font color="red">*</font></span></div>
                                <div class="row" align="center">
                                    <input type="hidden" name="image_passport" id="image_passport">
                                    <input type="file" style="display: none" name="image_footer_passport" data-name="image_footer_passport" id="image_footer_passport" class="form-control">
                                    <label for="image_footer_passport">  <img id="preview_img_passport" src="{{ asset('images/passport_img.png') }}" height="190"/></label>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h4>Personal Information(PNR)</h4>
                    <section>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="full_name">
                                    Full name (First name Middle name Last name)<font color="red">*</font>
                                </div>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="full_name" id="full_name" placeholder="Full Name" data-require-error="Full Name is required" required>
                                </div>
                                <div class="row-fluid" style="color: #1a5eba; font-style: italic;"> (Use international
                                    character as in ICAO line) </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="birthday">Date of birth
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="birthday" id="birthday" placeholder="Birthday"  data-require-error="Birthday is required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="nationality">Current nationality <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" name="nationality" id="nationality" placeholder="Nationality"  data-require-error="Nationality is required" required>
                                            <option value="">[Choose nationality]</option>
                                        @foreach ($current_nationality as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="religion">Religion <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="religion" id="religion" placeholder="Religion" data-require-error="Religion is required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="permanent_residential_address">Permanent residential address
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="permanent_residential_address" id="permanent_residential_address" placeholder="Permanent Residential Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="passport_number">Passport number <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control input-sm" name="passport_number" id="passport_number" placeholder="Passport Number" data-require-error="Passport Number is required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="expiry_date">Expiry date
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="expiry_date" id="expiry_date" placeholder="Expiry date" data-require-error="Expiry date is required" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_length_of_stay_in_vn">Intended length of stay in
                                    Viet Nam (number of days) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="intended_length_of_stay_in_vn" id="intended_length_of_stay_in_vn" placeholder="Intended length of stay in Viet Nam" data-require-error="Intended length of stay in Viet Nam is required" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_temporaty_residential_address_in_vn">Intended temporary
                                    residential address in Viet Nam <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="intended_temporaty_residential_address_in_vn" id="intended_temporaty_residential_address_in_vn" placeholder="Intended temporary residential address in Viet Nam" data-require-error="Intended temporary residential address in Viet Nam is required" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left">Sex <font color="red">*</font> </div>
                                <div class="col-sm-8">
                                    <div class="col-sm-6">
                                        <label class="radio-inline"> <input type="radio" name="sex" value="1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="nationality_at_birth">Nationality at birth</div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="nationality_at_birth" id="nationality_at_birth" placeholder="Nationality at birth" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="occupation">Occupation</div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="occupation" id="occupation" placeholder="Occupation" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="email">Email <font color="red">* </font></div>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control input-sm" name="email" id="email" placeholder="Email address" data-require-error="Email is required" data-pattern-error="Invalid email format" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="passport_type">Type <font color="red">*</font></div>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm" name="passport_type" id="passport_type" placeholder="Type passport"  data-require-error="Type passport is required" required>
                                        <option value="">[Choose type passport]</option>
                                        @foreach ($passport_type as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_date_of_entry">Intended date of entry
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="intended_date_of_entry" id="intended_date_of_entry" placeholder="Intended date of entry" data-require-error="Intended date of entry is required" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="purpose_of_entry">Purpose of entry <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" name="purpose_of_entry" id="purpose_of_entry" placeholder="Purpose of entry"  data-require-error="Purpose of entry is required" required>
                                        <option value="">[Choose Purpose]</option>
                                        @foreach ($purpose_of_entry as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="city_province">City/Province <font color="red">*
                                    </font>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" name="city_province" id="city_province" placeholder="City/Province"  data-require-error="City/Province is required" required>
                                        <option value="">[Choose City]</option>
                                        @foreach ($city_province as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <h4>Inviting/ guarentering agency/ organization (if any)</h4>
                    <section>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3 text_left" for="name_hosting_organisation">Name of hosting organisation</div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="name_hosting_organisation" id="name_hosting_organisation" placeholder="Name of hosting organisation" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 text_left" for="address">Address</div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="address" id="address" placeholder="Address" >
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <h4>Under 14 years old accompanying child(ren) included in your passport (if any) <span><a href="javascript:;" class="add_chilrent" title="Add childrent"> <img style="" src="{{ asset('images/u51_normal.png') }}"></a> </span></h4>
                    <section>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Full name (First name Middle name Last name)</th>
                                            <th>Sex</th>
                                            <th>Date of birth<br>(DD/MM/YYYY)</th>
                                            <th>Portrait photography</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list_child">
                                        <tr class="_item_child">
                                            <td>
                                                <label>1</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" name="fullname_child" placeholder="First name Middle name Last name">
                                            </td>
                                            <td>
                                                <div class="row-fluid">
                                                    <div class="span6"> 
                                                        <label class="radio-inline"> 
                                                           <input type="radio" class="sex_radio_child"  name="sex_child_1" value="1" checked="checked">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="span6">
                                                        <label class="radio-inline">
                                                            <input type="radio" class="sex_radio_child" name="sex_child_1" value="2">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                   <input type="text" class="form-control input-sm datetimepicker" name="birthday_child"  placeholder="birthday">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="file-input parent_input_file" style="text-align: center;">
                                                        <input type="hidden" name="image_avatar_child" id="image_avatar_child_1">
                                                        <input type="file" style="display: none" name="image_child" id="image_child_1" data-id_child="1" onchange="addImageChild(this)" class="form-control">
                                                        <label for="image_child_1">  <img id="preview_img_avatar_child_1" src="{{ asset('images/noavatar_2x.jpeg') }}" height="190"/></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="file-input" style="text-align: center;">
                                                    <a href="javascript:;" class="remove_item"> <img width="20" height="20" src="{{ asset('images/e_delete.png') }}" title="Delete"> </a>
                                                </div>
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                    <h4>Requested information</h4>
                    <section>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-5 text_left" for="grant_visa_valid_from">Grant Evisa valid from (DD/MM/YYYY) <font color="red">*</font></div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm datetimepicker" name="grant_visa_valid_from" id="grant_visa_valid_from" placeholder="Grant Evisa valid from" data-require-error="Grant Evisa valid from is required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5 text_left" for="alowed_to_entry_throuth_checkpoint">Allowed to entry through checkpoint
                                    <font color="red">*</font>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control input-sm select2" name="alowed_to_entry_throuth_checkpoint" id="alowed_to_entry_throuth_checkpoint">
                                        <option value="">[Choose Checkpoint]</option>
                                        @foreach ($entry_through_checkpoint as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="grant_visa_valid_to">To (DD/MM/YYYY)<font color="red">*
                                    </font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="grant_visa_valid_to" id="grant_visa_valid_to" placeholder="To" data-require-error="To is required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="exit_throuth_checkpoint">Exit through checkpoint<font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm select2" name="exit_throuth_checkpoint" id="exit_throuth_checkpoint">
                                        <option value="">[Choose Checkpoint]</option>
                                        @foreach ($entry_through_checkpoint as $key =>  $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <section>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <img class="col-sm-5 show_captcha" src="{{$captcha_src}}" alt="captcha">
                                <span><a href="javascript:;" class="reset_capcha"><img width="20" height="20" src="{{ asset('images/refresh.png') }}" title="Delete"></a></span>
                                <div class="col-sm-7" style="margin-top: 10px;">
                                    <input type="text" class="form-control" name="captcha">
                                </div>
                            </div>
                            <div class="col-sm-6" style="margin-top: 10px;display: flex;">
                                    <input class="col-sm-1" style="margin: 0 0 0 15px;" type="checkbox" name="checkbox" id="checkbox5">
                                    <label class="col-sm-11 text_left" style="margin:0;" for="checkbox5">I assure that I have truthfully declared all relevant details.</label>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <div class="col-sm-12" style="text-align: center">
                       <input type="submit" value="Review application form" class="btn submit" style="cursor: pointer">
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <h4>Fulfill foreigner’s information</h4>
                    <h5>Foreigner's images</h5>
                    <section>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="row text_left form-group" align="left"><span class="col-sm-12">Portrait photography<font color="red">*</font></span></div>
                                <div class="row" align="center">
                                    <label for="image_footer">  <img id="step_2_preview_img_avatar"  height="190"/></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row text_left form-group" align="left"><span class="col-sm-12">Passport data page image<font color="red">*</font></span></div>
                                <div class="row" align="center">
                                    <label for="image_footer_passport">  <img id="step_2_preview_img_passport"  height="190"/></label>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h4>Personal Information(PNR)</h4>
                    <section>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="full_name">
                                    Full name (First name Middle name Last name)
                                </div>

                                <div class="col-sm-8">
                                    <p class="step_2_full_name"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="birthday">Date of birth
                                    (DD/MM/YYYY) 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_birthday"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="nationality">Current nationality 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_nationality"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="religion">Religion 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_religion"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="permanent_residential_address">Permanent residential address
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_permanent_residential_address"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="passport_number">Passport number 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_passport_number"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="expiry_date">Expiry date
                                    (DD/MM/YYYY) 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_expiry_date"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_length_of_stay_in_vn">Intended length of stay in
                                    Viet Nam (number of days) 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_intended_length_of_stay_in_vn"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_temporaty_residential_address_in_vn">Intended temporary
                                    residential address in Viet Nam 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_intended_temporaty_residential_address_in_vn"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left">Sex  </div>
                                <div class="col-sm-8">
                                    <div class="col-sm-6">
                                        <p class="step_2_sex"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="nationality_at_birth">Nationality at birth</div>
                                <div class="col-sm-8">
                                    <p class="step_2_nationality_at_birth"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="occupation">Occupation</div>
                                <div class="col-sm-8">
                                    <p class="step_2_occupation"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="email">Email</div>
                                <div class="col-sm-8">
                                    <p class="step_2_email"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="passport_type">Type </div>
                                <div class="col-sm-8">
                                    <p class="step_2_passport_type"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_date_of_entry">Intended date of entry
                                    (DD/MM/YYYY) 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_intended_date_of_entry"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="purpose_of_entry">Purpose of entry 
                                </div>
                                <div class="col-sm-8">
                                    <p class="step_2_purpose_of_entry"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="city_province">City/Province </div>
                                <div class="col-sm-8">
                                    <p class="step_2_city_province"></p>
                                </div>
                            </div>

                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <h4>Inviting/ guarentering agency/ organization (if any)</h4>
                    <section>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3 text_left" for="name_hosting_organisation">Name of hosting organisation</div>
                                <div class="col-sm-9">
                                    <p class="step_2_name_hosting_organisation"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 text_left" for="address">Address</div>
                                <div class="col-sm-9">
                                    <p class="step_2_address"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <h4>Under 14 years old accompanying child(ren) included in your passport (if any)</h4>
                    <section>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Full name (First name Middle name Last name)</th>
                                            <th>Sex</th>
                                            <th>Date of birth<br>(DD/MM/YYYY)</th>
                                            <th>Portrait photography</th>
                                        </tr>
                                    </thead>
                                    <tbody class="step_2_list_child">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                    <h4>Requested information</h4>
                    <section>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-2 text_left" for="step_2_registration_code">Registration code </div>
                                <div class="col-sm-2">
                                    <p class="step_2_registration_code"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-5 text_left" for="grant_visa_valid_from">Grant Evisa valid from (DD/MM/YYYY)</div>
                                <div class="col-sm-7">
                                    <p class="step_2_grant_visa_valid_from"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5 text_left" for="alowed_to_entry_throuth_checkpoint">Allowed to entry through checkpoint</div>
                                <div class="col-sm-7">
                                    <p class="step_2_alowed_to_entry_throuth_checkpoint"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="grant_visa_valid_to">To (DD/MM/YYYY)</div>
                                <div class="col-sm-8">
                                    <p class="step_2_grant_visa_valid_to"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="exit_throuth_checkpoint">Exit through checkpoint</div>
                                <div class="col-sm-8">
                                    <p class="step_2_exit_throuth_checkpoint"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <div class="col-sm-12" style="text-align: center">
                        <button class="btn next" type="submit">Payment</button>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-md-12">
                        <h3> Step 3</h3>
                        <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                    </div>
                </div>
               
            </form>
        </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.4.1.min.js"></script>      
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
        document.getElementById('valForm').validateForm();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $('.submit').click(function (e) { 
            let selecter = this;
            e.preventDefault();
            showLoading();
            var list_child_items = [];
            $('.list_child ._item_child').each(function(){
                               
                let fullname_child = $(this).find("[name='fullname_child']").val();
                let sex_child = $(this).find('.sex_radio_child:radio:checked').val();
                let birthday_child = $(this).find("[name='birthday_child']").val();
                let image_avatar_child = $(this).find("[name='image_avatar_child']").val();
                list_child_items.push({
                        fullname_child: fullname_child,
                        sex_child: sex_child,
                        birthday_child: birthday_child,
                        image_avatar_child: image_avatar_child
                });
              
            })
           
          
            var form_data = new FormData($('#valForm')[0]);
            if(list_child_items.length > 0){
                form_data.append('list_child_items', JSON.stringify(list_child_items) );
            }
            $.ajax({
                    url: '/payment/info',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false, 
                    success: function (response) {
                        hideLoading();
                        console.log(response.data);
                      
                        if (response.status == true) {
                            toastr.success(response.message);
                            $('#step_2_preview_img_passport').attr('src', response.data.passport_data_page_image).height(190).width(310);
                            $('#step_2_preview_img_avatar').attr('src', response.data.portrait_photography).height(190).width(150);
                            $('.step_2_registration_code').text(response.data.code);
                            $('.step_2_full_name').text(response.data.full_name);
                            $('.step_2_birthday').text(response.data.birthday);
                            $('.step_2_nationality').text(response.data.nationality);
                            $('.step_2_religion').text(response.data.religion);
                            $('.step_2_permanent_residential_address').text(response.data.permanent_residential_address);
                            $('.step_2_passport_number').text(response.data.passport_number);
                            $('.step_2_expiry_date').text(response.data.expiry_date);
                            $('.step_2_intended_length_of_stay_in_vn').text(response.data.full_name);
                            $('.step_2_intended_temporaty_residential_address_in_vn').text(response.data.intended_temporaty_residential_address_in_vn);
                            $('.step_2_sex').text(response.data.sex);
                            $('.step_2_nationality_at_birth').text(response.data.nationality_at_birth);
                            $('.step_2_occupation').text(response.data.occupation);
                            $('.step_2_email').text(response.data.email);
                            $('.step_2_passport_type').text(response.data.passport_type);
                            $('.step_2_intended_date_of_entry').text(response.data.intended_date_of_entry);
                            $('.step_2_purpose_of_entry').text(response.data.purpose_of_entry);
                            $('.step_2_city_province').text(response.data.city_province);
                            $('.step_2_name_hosting_organisation').text(response.data.name_hosting_organisation);
                            $('.step_2_address').text(response.data.address);
                            $('.step_2_grant_visa_valid_from').text(response.data.grant_visa_valid_from);
                            $('.step_2_alowed_to_entry_throuth_checkpoint').text(response.data.alowed_to_entry_throuth_checkpoint);
                            $('.step_2_grant_visa_valid_to').text(response.data.grant_visa_valid_to);
                            $('.step_2_exit_throuth_checkpoint').text(response.data.exit_throuth_checkpoint);
                            if(response.data.children_14_years_old){
                                let children_14_years_old = JSON.parse(response.data.children_14_years_old);
                                let html = '';
                                children_14_years_old.forEach((item,index)=>{
                                     index=index+1;
                                     html +=  ' <tr class="_item_child">'+
                                                '<td>'+
                                                '    <label>'+index+'</label>'+
                                                '</td>'+
                                                '<td>'+
                                                '       <p>'+item.fullname_child+'</p>'+
                                                '</td>'+
                                                '<td>'+
                                                '    <div class="row-fluid">'+
                                                '        <div class="span6"> '+
                                                '            <label class="radio-inline"> '+
                                                '                <p>'+item.sex_child+'</p>'+
                                                '            </label>'+
                                                '        </div>'+
                                                '    </div>'+
                                                '</td>'+
                                                '<td>'+
                                                '    <div class="form-group">'+
                                                '                <p>'+item.birthday_child+'</p>'+
                                                '    </div>'+
                                                '</td>'+
                                                '<td>'+
                                                '    <div class="file-input parent_input_file" style="text-align: center;">'+
                                                '            <img src="'+item.image_avatar_child+'" height="190"/>'+
                                                '    </div>'+
                                                '</td>'+
                                                '</tr>';
                                })
                                $(".step_2_list_child").append(html);
                            }
                        }else{
                            toastr.error(response.message);
                        }
                        nextForm(selecter);
                        // setTimeout(() => {
                        //     location.reload()
                        // }, 1000)
                    },
                    error: function (response){
                        hideLoading();
                        toastr.warning(response.responseJSON.message);
                        // setTimeout(() => {
                        //     location.reload()
                        // }, 1000)
                    }
            });
        });
        $('.next').click(function (e) { 
            e.preventDefault();
            nextForm(this);
        });
        $('#clear_image').click(function (e) {
            e.preventDefault();
            $('#preview_img').attr('src','{{ asset('images/noavatar_2x.jpeg') }}').height(190);
            $('#image_avatar').val('');
            $('#image_footer').val('')
        });
        $('#image_footer,#image_footer_passport').on('change', function(e) {
            let check = $(this).data('name');
           
            var form_data = new FormData();
            form_data.append('attach_file', e.target.files[0]);
            if (e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                if(check == 'image_footer_passport'){
                    $('#preview_img_passport').attr('src', e.target.result).height(190).width(310);
                }else{
                    $('#preview_img_avatar').attr('src', e.target.result).height(190).width(150);
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
                success: function(response) {
                    var get_response =JSON.parse(response);
                    if(get_response.success == true){
                        if(check == 'image_footer_passport'){
                            $('#image_passport').val(get_response.url);
                        }else{
                            $('#image_avatar').val(get_response.url);
                        }
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        });
        function addImageChild(element){
            let id_child = $(element).data('id_child');
            let file_child = element.files[0];
            if(file_child){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_img_avatar_child_'+id_child).attr('src', reader.result).height(190).width(150);
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
                success: function(response) {
                    var get_response =JSON.parse(response);
                    if(get_response.success == true){
                        $('#image_avatar_child_'+id_child).val(get_response.url);
                    }
                },
                error: function (e) {
                    $('#preview_img_avatar_child_'+id_child).attr('src','{{ asset('images/noavatar_2x.jpeg') }}').height(190).width(150);
                    console.log(e);
                }
            });
            }
        }
        var count = 1;
        $('.add_chilrent').click(function (e) { 
            e.preventDefault();
            count +=1;
            var html = ' <tr class="_item_child">'+
                           '<td>'+
                           '    <label>'+count+'</label>'+
                           '</td>'+
                           '<td>'+
                           '    <input type="text" class="form-control input-sm" name="fullname_child" placeholder="First name Middle name Last name">'+
                           '</td>'+
                           '<td>'+
                           '    <div class="row-fluid">'+
                           '        <div class="span6"> '+
                           '            <label class="radio-inline"> '+
                           '                <input type="radio" class="sex_radio_child" name="sex_child_'+count+'" value="1" checked="checked">'+
                           '                Male'+
                           '            </label>'+
                           '        </div>'+
                           '        <div class="span6">'+
                           '            <label class="radio-inline">'+
                           '                <input type="radio" class="sex_radio_child" name="sex_child_'+count+'" value="2">'+
                           '                Female'+
                           '            </label>'+
                           '        </div>'+
                           '    </div>'+
                           '</td>'+
                           '<td>'+
                           '    <div class="form-group">'+
                           '        <input type="text" class="form-control input-sm datetimepicker" name="birthday_child"  placeholder="birthday">'+
                           '    </div>'+
                           '</td>'+
                           '<td>'+
                           '    <div class="file-input parent_input_file" style="text-align: center;">'+
                           '            <input type="hidden" name="image_avatar_child" id="image_avatar_child_'+count+'">'+
                           '            <input type="file" style="display: none" name="image_child" data-id_child="'+count+'" onchange="addImageChild(this)" id="image_child_'+count+'" class="form-control">'+
                           '            <label for="image_child_'+count+'">  <img id="preview_img_avatar_child_'+count+'" src="{{ asset('images/noavatar_2x.jpeg') }}" height="190"/></label>'+
                           '    </div>'+
                           '</td>'+
                           '<td>'+
                           '    <div class="file-input" style="text-align: center;">'+
                           '        <a href="javascript:;" class="remove_item"> <img width="20" height="20" src="{{ asset('images/e_delete.png') }}" title="Delete"> </a>'+
                           '    </div>'+
                           '</td>'+
                        '</tr>';
            $(".list_child").append(html);
            $('.list_child ._item_child').each(function(){
                $(this).find(".datetimepicker").datetimepicker({
                    format: 'DD/MM/YYYY',
                    allowInputToggle: true
                })
            })
        });
        $(".list_child").on("click", ".remove_item", function(){
            count -=1;
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
                        }else{
                            toastr.error(response.message);
                        }
                    },
                    error: function (response){
                        toastr.error(response.responseJSON.message);
                    }
            });
        });
    </script>
</body>

</html>