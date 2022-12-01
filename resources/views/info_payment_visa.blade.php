<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Info Payment Visa</title>
    
    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/css/easydropdown.css" rel="stylesheet">
    <link href="/wp/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wp/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/css/default.css" rel="stylesheet">
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

            <form id="valForm" class="form-horizontal">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Step 3</p>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-1">
                    <h4>Fulfill foreigner’s information</h4>
                    <h5>Foreigner's images</h5>
                    <section>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="span2" align="right"> Portrait photography<font color="red">*</font>
                                    </div>
                                    <div class="span2">
                                        <div class="kv-avatar center-block" style="width: 4cm;" align="center">
                                            <div class="file-input">
                                                <div class="file-preview ">
                                                    <div class="file-drop-disabled">
                                                        <div class="file-preview-thumbnails">
                                                            <div class="file-default-preview clickable" tabindex="-1">
                                                                <img width="150px" id="anh-dai-dien-default" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC5q-0lXP6x87x-u4XGkUq6yj7qg0p4IQ0VqfBXybzkab-SWgySLiLDJbDbgff0MnYZKE&usqp=CAU" data-zoom-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC5q-0lXP6x87x-u4XGkUq6yj7qg0p4IQ0VqfBXybzkab-SWgySLiLDJbDbgff0MnYZKE&usqp=CAU">
                                                                <h6 class="text-muted">Select</h6>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="file-preview-status text-center text-success"></div>
                                                        <div class="kv-fileinput-error"></div>
                                                    </div>
                                                </div> <button type="button" tabindex="500" title="Delete to change" class="btn btn-default remove-anh-dai-dien fileinput-remove fileinput-remove-button"><img width="20" height="20" src="https://evisa.xuatnhapcanh.gov.vn/eVisa-frontend-theme/images/etrans/e_delete.png">
                                                    <span class="hidden-xs">Delete</span></button>
                                            </div>
                                            <div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="kv-zoom-actions pull-right"><button type="button" class="btn btn-default btn-header-toggle btn-toggleheader" title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="icon-resize-vertical"></i></button><button type="button" class="btn btn-default btn-fullscreen" title="Toggle full screen" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="icon-fullscreen"></i></button><button type="button" class="btn btn-default btn-borderless" title="Toggle borderless mode" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="icon-resize-full"></i></button><button type="button" class="btn btn-default btn-close" title="Close detailed preview" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button></div>
                                                            <h3 class="modal-title">Detailed Preview <small><span class="kv-zoom-title"></span></small></h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="floating-buttons"></div>
                                                            <div class="kv-zoom-body file-zoom-content"></div>
                                                            <button type="button" class="btn btn-navigate btn-prev" title="View previous file"><i class="icon-step-backward"></i></button> <button type="button" class="btn btn-navigate btn-next" title="View next file"><i class="icon-step-forward"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><input id="_khaithithucdientu_WAR_eVisaportlet_anhDaiDien" name="_khaithithucdientu_WAR_eVisaportlet_anhDaiDien" type="file" class="" style="display: none;">
                                            <br>
                                            <div id="_khaithithucdientu_WAR_eVisaportlet_valid-anhChanDung" style="color: rgb(221, 75, 57); display: none;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="span2" align="right">
                                    Passport data page image<font color="red">*</font>
                                </div>
                                <div class="span4">
                                    <div class="kv-avatar center-block" align="center">
                                        <div class="file-input">
                                            <div class="file-preview ">
                                                <div class="file-drop-disabled">
                                                    <div class="file-preview-thumbnails">
                                                        <div class="file-default-preview clickable" tabindex="-1"><img width="300" id="anh-ho-chieu-default" src="https://bankervn.com/wp-content/uploads/2018/03/Ho-chieu-tre-em-Passport-tre-em-2022.jpg" data-zoom-image="https://bankervn.com/wp-content/uploads/2018/03/Ho-chieu-tre-em-Passport-tre-em-2022.jpg">
                                                            <h6 class="text-muted">Select</h6>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="file-preview-status text-center text-success"></div>
                                                    <div class="kv-fileinput-error"></div>
                                                </div>
                                            </div> <button type="button" tabindex="500" title="Delete to change" class="btn btn-default remove-anh-ho-chieu fileinput-remove fileinput-remove-button"><img width="20" height="20" src="https://evisa.xuatnhapcanh.gov.vn/eVisa-frontend-theme/images/etrans/e_delete.png">
                                                <span class="hidden-xs">Delete</span></button>
                                        </div><input id="_khaithithucdientu_WAR_eVisaportlet_anh-ho-chieu" name="_khaithithucdientu_WAR_eVisaportlet_anh-ho-chieu" type="file" class="" style="display: none;">
                                        <br>
                                        <div id="_khaithithucdientu_WAR_eVisaportlet_valid-anhHoChieu" style="color: rgb(221, 75, 57); display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h4>Personal Information(PNR)</h4>
                    <section>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="full_name">
                                    Full name (First name Middle name Last name) <font color="red">*</font>
                                </div>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="full_name" id="full_name" placeholder="Full Name" data-require-error="Full Name is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="religion">Religion <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="religion" id="religion" placeholder="Religion" data-require-error="Religion is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="permanent_residential_address">Permanent residential address
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="permanent_residential_address" id="permanent_residential_address" placeholder="Permanent Residential Address">
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="passport_number">Passport number <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control input-sm" name="passport_number" id="passport_number" placeholder="Passport Number" data-require-error="Passport Number is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="expiry_date">Expiry date
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="expiry_date" id="expiry_date" placeholder="Expiry date" data-require-error="Expiry date is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_length_of_stay_in_vn">Intended length of stay in
                                    Viet Nam (number of days) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control input-sm" name="intended_length_of_stay_in_vn" id="intended_length_of_stay_in_vn" placeholder="Intended length of stay in Viet Nam" data-require-error="Intended length of stay in Viet Nam is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_temporaty_residential_address_in_vn">Intended temporary
                                    residential address in Viet Nam <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control input-sm" name="intended_temporaty_residential_address_in_vn" id="intended_temporaty_residential_address_in_vn" placeholder="Intended temporary residential address in Viet Nam" data-require-error="Intended temporary residential address in Viet Nam is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>

                            </div>
                            <!-- <div class="form-group">
                                    <div class="col-sm-4 text_left" for="exampleInputPassword1">Password</div>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control input-sm" id="exampleInputPassword1"
                                        placeholder="Password" data-require-error="Password is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 text_left" for="exampleInputMessage">Message Box</div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control input-sm" id="exampleInputMessage"
                                        placeholder="Type your message here" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 text_left" for="exampleInputNumber">Number Only</div>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control input-sm" id="exampleInputNumber"
                                        placeholder="Number Only" data-require-error="Number is required" required>
                                    </div>
                                </div> -->

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="exampleName">Date of birth
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="exampleName" placeholder="Name" pattern="[a-z]{1,15}" data-require-error="Name is required" data-pattern-error="Username should be lower case upto 15 characters" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="nationality_at_birth">Nationality at birth</div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="nationality_at_birth" id="nationality_at_birth" placeholder="Nationality at birth" >
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="occupation">Occupation</div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="occupation" id="occupation" placeholder="Occupation" >
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="email">Email <font color="red">* </font></div>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control input-sm" name="email" id="email" placeholder="Email address" data-require-error="Email is required" data-pattern-error="Invalid email format" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. </span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 text_left" for="intended_date_of_entry">Intended date of entry
                                    (DD/MM/YYYY) <font color="red">*</font>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm datetimepicker" name="intended_date_of_entry" id="intended_date_of_entry" placeholder="Intended date of entry" data-require-error="Intended date of entry is required" required>
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us. Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 text_left" for="address">Address</div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="address" id="address" placeholder="Address" >
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                            <th>Full name (First name Middle name Last name)</th>
                                            <th>Sex</th>
                                            <th>Date of birth<br>(DD/MM/YYYY)</th>
                                            <th>Portrait photography</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- TRE EM 1 -->
                                        <tr>
                                            <!-- Ten Tre Em -->
                                            <td>
                                                <div class="row-fluid">
                                                    <div class="span4"> 1 </div>
                                                    <div class="span8"> <input type="text" id="_khaithithucdientu_WAR_eVisaportlet_hTenTreEm1" name="_khaithithucdientu_WAR_eVisaportlet_hTenTreEm1" class="span12" value=""> </div>
                                                </div>
                                            </td> <!-- Gioi Tinh Tre Em -->
                                            <td>
                                                <div class="row-fluid">
                                                    <div class="span6"> <label class="radio-inline"> <input type="radio" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm-nam1" name="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm1" value="M" checked="checked">
                                                            Male
                                                        </label>
                                                    </div>

                                                    <div class="span6">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm-nu1" name="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm1" value="F">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="row-fluid" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm1-error"></div>
                                                </div>
                                            </td>
                                            <!-- Ngay Sinh Tre Em -->
                                            <td>
                                                <div class="row-fluid">
                                                    <input type="text" class="span12" id="_khaithithucdientu_WAR_eVisaportlet_ngaySinhTreEm1" placeholder="20/12/2010">
                                                </div>
                                            </td>
                                            <!-- ANH TRE EM 1-->
                                            <td>
                                                <div class="kv-avatar center-block" style="width: 80px; display: block; margin-left: auto; margin-right: auto" align="center">
                                                    <div class="file-input">
                                                        <div class="file-preview ">
                                                            <div class="file-drop-disabled">
                                                                <div class="file-preview-thumbnails">
                                                                    <div class="file-default-preview clickable" tabindex="-1">
                                                                        <img id="anh-tre-em-1-default" width="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC5q-0lXP6x87x-u4XGkUq6yj7qg0p4IQ0VqfBXybzkab-SWgySLiLDJbDbgff0MnYZKE&usqp=CAU" data-zoom-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC5q-0lXP6x87x-u4XGkUq6yj7qg0p4IQ0VqfBXybzkab-SWgySLiLDJbDbgff0MnYZKE&usqp=CAU">
                                                                        <h6 class="text-muted">Select</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="file-preview-status text-center text-success"></div>
                                                                <div class="kv-fileinput-error"></div>
                                                            </div>
                                                        </div> <button type="button" tabindex="500" title="Delete to change" class="btn btn-default remove-anh-tre-em-1 fileinput-remove fileinput-remove-button"><img width="20" height="20" src="https://evisa.xuatnhapcanh.gov.vn/eVisa-frontend-theme/images/etrans/e_delete.png">
                                                            <span class="hidden-xs">Delete</span></button>
                                                    </div><input id="_khaithithucdientu_WAR_eVisaportlet_anhTreEm1" name="_khaithithucdientu_WAR_eVisaportlet_anhTreEm1" type="file" class="" style="display: none;">
                                                </div>
                                                <div id="_khaithithucdientu_WAR_eVisaportlet_valid-anhTreEm1" align="center" style="color: rgb(221, 75, 57); display: none;"></div>
                                            </td>
                                            <!-- DELETE 1-->
                                            <td>
                                                <div style="padding-top: 80%; padding-left: 35%;">
                                                    <a href="javascript:void(0)" onclick="deleteTreEm1()"> <img width="20" height="20" src="https://evisa.xuatnhapcanh.gov.vn/eVisa-frontend-theme/images/etrans/e_delete.png" title="Delete"> </a>
                                                </div><a href="javascript:void(0)" onclick="deleteTreEm1()"> </a>
                                            </td>
                                        </tr> <!-- TRE EM 2 -->
                                        <tr>
                                            <!-- Ten Tre Em 2 -->
                                            <td>
                                                <div class="row-fluid">
                                                    <div class="span4"> 2 </div>
                                                    <div class="span8"> <input type="text" id="_khaithithucdientu_WAR_eVisaportlet_hTenTreEm2" name="_khaithithucdientu_WAR_eVisaportlet_hTenTreEm2" class="span12" value=""> </div>
                                                </div>
                                            </td> <!-- Gioi Tinh Tre Em 2 -->
                                            <td>
                                                <div class="row-fluid">
                                                    <div class="span6"> <label class="radio-inline"> <input type="radio" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm-nam2" name="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm2" value="M" checked="checked">
                                                            Male
                                                        </label>
                                                    </div>

                                                    <div class="span6">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm-nu2" name="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm2" value="F">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="row-fluid" id="_khaithithucdientu_WAR_eVisaportlet_gioiTinhTreEm2-error">
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Ngay Sinh Tre Em 2 -->
                                            <td>
                                                <div class="row-fluid">
                                                    <input type="text" class="span12" id="_khaithithucdientu_WAR_eVisaportlet_ngaySinhTreEm2" placeholder="20/12/2010">
                                                </div>
                                            </td>
                                            <!-- ANH TRE EM 2-->
                                            <td>
                                                <div class="kv-avatar center-block" style="width: 80px; display: block; margin-left: auto; margin-right: auto" align="center">
                                                    <div class="file-input">
                                                        <div class="file-preview ">
                                                            <div class="file-drop-disabled">
                                                                <div class="file-preview-thumbnails">
                                                                    <div class="file-default-preview clickable" tabindex="-1">
                                                                        <img width="100" id="anh-tre-em-2-default" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC5q-0lXP6x87x-u4XGkUq6yj7qg0p4IQ0VqfBXybzkab-SWgySLiLDJbDbgff0MnYZKE&usqp=CAU">
                                                                        <h6 class="text-muted">Select</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="file-preview-status text-center text-success"></div>
                                                                <div class="kv-fileinput-error"></div>
                                                            </div>
                                                        </div> <button type="button" tabindex="500" title="Delete to change" class="btn btn-default remove-anh-tre-em-2 fileinput-remove fileinput-remove-button"><img width="20" height="20" src="https://evisa.xuatnhapcanh.gov.vn/eVisa-frontend-theme/images/etrans/e_delete.png">
                                                            <span class="hidden-xs">Delete</span></button>
                                                    </div><input id="_khaithithucdientu_WAR_eVisaportlet_anhTreEm2" name="_khaithithucdientu_WAR_eVisaportlet_anhTreEm2" type="file" class="" style="display: none;">
                                                </div>
                                                <div id="_khaithithucdientu_WAR_eVisaportlet_valid-anhTreEm2" align="center" style="color: rgb(221, 75, 57); display: none;"></div>
                                            </td>
                                            <!-- DELETE 2-->
                                            <td>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
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
                                    <span class="popup" tabindex="0">
                                        <span>Discounts may apply if you already hold home, car or life policies with
                                            us.
                                            Discounts may apply if you already hold home, car or life policies with
                                            us.</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <section>
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="checkbox" name="checkbox" id="checkbox5" data-require-error="Please accept terms and condition." required>
                                <label class="text_left" for="checkbox5">I assure that I have truthfully declared all
                                    relevant details.</label>
                            </div>
                        </div>
                    </section>
                    <!-- <div class="col-sm-12">
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div> -->

                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 2</h3>
                            <div class="form-group">
                                <label class="col-sm-4 text_left">Company Name</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text_left">Company Address</label>
                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 3</h3>
                            <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="checkboxes styled-checkbox form-group">
                    <input type="checkbox" name="checkbox" id="checkbox5"
                        data-require-error="Please accept terms and condition." required>
                    <label class="col-sm-4 text_left" for="checkbox5">I agree with terms and conditions</label>
                </div> -->
                <input type="submit" onclick="return showLoading()" value="submit" class="btn btn-primary submit">
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
    <script src="/js/main.js"></script> 
    <script>
        document.getElementById('valForm').validateForm();
    </script>
</body>

</html>