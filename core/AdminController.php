<?php

class AdminController extends BaseController{
    public function __construct()
    {
        if(!isset($_SESSION['admin'])){
            header('location: '._WEB.'/admin/Auth/login');
        }
    }
}