<?php
    // Home
    $routes['default_controller'] = 'home';
    $routes['trang-chu'] = 'home/index';
    //Product
    $routes['danh-sach-san-pham'] = 'product/index';
    $routes['chi-tiet/(.+)'] = 'product/detail/$1';
    $routes['fetch/(.+)/size'] = 'product/size/$1';

    //FunctionHandle
    $routes['otp-dang-ki/(.+)'] = 'functionHandle/generateOtpForSignUp/$1';
    $routes['dang-ki']='functionHandle/signUp';
    $routes['add-cart']='functionHandle/addCart';

    // Payment
    $routes['gio-hang'] = 'payment/cart';
    $routes['tao-hoa-don'] = 'payment/createReceipt';
    $routes['xu-li-thanh-toan'] = 'payment/paymentHandle';
    $routes['thanh-toan'] = 'payment/checkOut';
    // Account
    $routes['xu-li-dang-nhap'] = 'account/loginValidate';
    $routes['dang-nhap']='account/login';


    //Admin
    $routes['quan-li-san-pham'] = 'admin/productManage/index';
    $routes['dang-nhap-zalo-admin'] = 'admin/auth/ZaloLogin';
