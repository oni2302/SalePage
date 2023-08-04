<?php
    // Home
    $routes['default_controller'] = 'home';
    $routes['trang-chu'] = 'home/index';
    //Product
    $routes['danh-sach-san-pham'] = 'product/index';
    $routes['chi-tiet/(.+)'] = 'product/detail/$1';
?>