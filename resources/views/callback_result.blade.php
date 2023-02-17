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
    <link href="/css/default.css?v=3" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wp/css/toastr.min.css') }}">  
</head>

<body>
    <div id="fade_overlay"><img id="fade_loading" src="/images/shares/loadding.gif"/></div>
    <hr>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                <div class="col s6 center">
                    <h3>Kết quả</h3>
                    <ul class="collection col-md-8">
                        <li class="collection-item">
                            <div>
                                <?php if ($errorCode == '000' || $errorCode == '155') {
                                    echo "Giao Dịch Thành Công!";
                                } else {
                                    echo "Giao Dịch Thất Bại!";
                                } ?>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                <h6>Mã Giao Dịch : </h6>
                                <p><?php
                                    echo $transactionCode;
                                    echo '<br>Lấy thông tin giao dịch trả góp<br>';
                                    $info = json_decode($alepay->getTransactionInfo($transactionCode));
                                    echo '<pre>';
                                    var_dump($info);
                                    echo '</pre>';
                                    ?></p>
                            </div>
                        </li>
                    </ul>
                    <ul class="collection col-md-8">
                        <li class="collection-item">
                            <div>
                                <a href="<?php echo ('http://' . $_SERVER['SERVER_NAME'] . '/index.php') ?>">Nhấn Vào Đây Nếu Bạn Muốn Mua Tiếp</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
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