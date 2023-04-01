<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Result Payment</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/css/easydropdown.css" rel="stylesheet">
    <link href="/wp/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wp/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/css/default.css?v=4" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wp/css/toastr.min.css') }}">
</head>

<body>
    <div id="fade_overlay"><img id="fade_loading" src="/images/shares/loadding.gif"/></div>
    <br>
    <main>
        <div class="container">

            @if (@$errorCode == '000')
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                    <tr>
                        <td style="background:#ffffff">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td>
                                        <span class="site-logo-img">
                                            <a href="https://visatravela.com/" class="sticky-custom-logo" rel="home"
                                               itemprop="url">
                                                <img width="360" height="103"
                                                     src="https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3.png"
                                                     class="custom-logo" alt="" loading="lazy"
                                                     srcset="https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3.png 360w, https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3-150x43.png 150w"
                                                     sizes="(max-width: 360px) 100vw, 360px">
                                            </a>
                                        </span>
                                    </td>
                                    <td >
                                        <div style="vertical-align:middle;color:#999999;font-size:14px;line-height:17px;font-family:Gotham,'Helvetica Neue',Helvetica,Arial,sans-serif">Hotline:(Số máy lẻ 3024 hoặc 3029)</div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="nav-progress">
                                <div class="complete">
                                    {{--                    Register--}}
                                    Step 1
                                    <div class="arrow-wrapper">
                                        <div class="arrow-cover">
                                            <div class="arrow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="complete">
                                    {{--                    Confirm Payment--}}
                                    Step 2
                                    <div class="arrow-wrapper">
                                        <div class="arrow-cover">
                                            <div class="arrow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="active">
                                    {{--                    Approval Confirmation--}}
                                    Step 3
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-collapse:collapse;border-left:1px solid #ffffff;border-right:1px solid #ffffff;background:#ffffff">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tbody><tr>
                                    <td style="padding:30px 20px 0px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <span style="color:#666666;font-size:21px">Giao dịch nhận thanh toán</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 20px 20px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <span style="color:#666666;font-size:14px">Xin chào, <span style="text-transform: uppercase;">{{$info_payment->full_name}}</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0px 20px 10px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <span style="color:#666666;font-size:13px">Bạn vừa nhận được giao dịch thanh toán. Vui lòng thực hiện cam kết giao hàng hoặc trả dịch vụ cho khách hàng sớm nhất có thể.</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0px 20px">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-top:1px solid #dcdcdc;font-family:Arial;font-size:13px">
                                            <tbody><tr>
                                                <td align="left" style="padding:8px 10px 8px 0px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">
                                                    <span style="font-size:12px">
                                                        Khách hàng:<br>
                                                        <span style="text-transform: uppercase;">{{$info_payment->full_name}}</span><br>
                                                    </span>
                                                </td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px" colspan="2">
                                                    <span style="font-size:12px">
                                                        Email: <a href="mailto:tund@dxmb.vn" target="_blank">{{$info_payment->email}}</a><br>
                                                        Số điện thoại: {{$info_payment->phone}}<br>
                                                        Địa chỉ: {{$info_payment->address}}<br>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding:8px 10px 8px 0px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">Nội dung thanh toán</td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px" colspan="2">E Visa</td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding:8px 10px 8px 0px;color:#7b7b7b;border-bottom:2px solid #dcdcdc">Mã giao dịch</td>
                                                <td style="border-bottom:2px solid #dcdcdc;padding:8px 0px 8px 0px" colspan="2">{{$transaction_code}}</td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding:8px 10px 8px 0px;color:#7b7b7b;border-bottom:2px solid #dcdcdc">Mã đơn hàng</td>
                                                <td style="border-bottom:2px solid #dcdcdc;padding:8px 0px 8px 0px" colspan="2">{{$info_payment->code}}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="left" style="padding:8px 0px 8px 0px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">Giá trị đơn hàng</td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px 10px" align="right"><strong>{{number_format(@$info_payment->amount)}}</strong> VND</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="left" style="padding:8px 0px 8px 0px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">Số tiền thanh toán</td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px 10px" align="right"><strong>{{number_format(@$transaction_payment->amount)}}</strong> VND</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="left" style="padding:8px 0px 8px 0px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">Thời gian</td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px 10px" align="right">{{@$transaction_payment->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="left" style="padding:8px 0px 8px;color:#7b7b7b;border-bottom:1px solid #dcdcdc">Trạng thái giao dịch</td>
                                                <td style="border-bottom:1px solid #dcdcdc;padding:8px 0px 8px 10px" align="right">Thành công</td>
                                            </tr>

                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 20px 0px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <div>
                                            <a href="/">Nhấn vào đây để trở về trang chủ</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%" border="0" style="background:#ffffff">
                                <tbody><tr>
                                    <td style="padding:20px 20px 20px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <div style="color:#666666;font-size:14px"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="background-color:#e2e2e2;font-size:12px;vertical-align:middle;text-align:center;padding:10px 20px 10px 20px;line-height:18px;border:1px solid #e2e2e2;font-family:Arial;color:#949494">
                                        Bản quyền © 2023 visatravela<br>
                                        Hotline: - Email: <a style="text-decoration:none;color:#427fed" href="#" target="_blank">support@visatravela.com</a>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table>
            @else
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                    <tr>
                        <td style="background:#ffffff">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td>
                                        <span class="site-logo-img">
                                            <a href="https://visatravela.com/" class="sticky-custom-logo" rel="home" itemprop="url">
                                                <img width="360" height="103" src="https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3.png" class="custom-logo" alt="" loading="lazy" srcset="https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3.png 360w, https://visatravela.com/wp-content/uploads/2021/09/visatravela-logo3-150x43.png 150w" sizes="(max-width: 360px) 100vw, 360px">
                                            </a></span>
                                    </td>
                                    <td >
                                        <div style="vertical-align:middle;color:#999999;font-size:14px;line-height:17px;font-family:Gotham,'Helvetica Neue',Helvetica,Arial,sans-serif">Hotline:(Số máy lẻ 3024 hoặc 3029)</div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="nav-progress">
                                <div class="complete">
                                    {{--                    Register--}}
                                    Step 1
                                    <div class="arrow-wrapper">
                                        <div class="arrow-cover">
                                            <div class="arrow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="complete">
                                    {{--                    Confirm Payment--}}
                                    Step 2
                                    <div class="arrow-wrapper">
                                        <div class="arrow-cover">
                                            <div class="arrow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="active">
                                    {{--                    Approval Confirmation--}}
                                    Step 3
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-collapse:collapse;border-left:1px solid #ffffff;border-right:1px solid #ffffff;background:#ffffff">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tbody>
                                <tr>
                                    <td style="padding:30px 20px 0px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <span style="color:#666666;font-size:21px">Xác nhận giao dịch :</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="color:#666666;font-size:24px">Giao dịch không thành công.</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 20px 0px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <div>
                                            <a href="/">Nhấn vào đây để trở về trang chủ</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%" border="0" style="background:#ffffff">
                                <tbody><tr>
                                    <td style="padding:20px 20px 20px 20px;vertical-align:middle;line-height:20px;font-family:Arial;background-color:#ffffff;text-align:left">
                                        <div style="color:#666666;font-size:14px"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="background-color:#e2e2e2;font-size:12px;vertical-align:middle;text-align:center;padding:10px 20px 10px 20px;line-height:18px;border:1px solid #e2e2e2;font-family:Arial;color:#949494">
                                        Bản quyền © 2023 visatravela<br>
                                        Hotline: - Email: <a style="text-decoration:none;color:#427fed" href="#" target="_blank">support@visatravela.com</a>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
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

    </script>
</body>
</html>
