<?php
class App
{
    private $__controller, $__action, $__params,$__routes;
    function __construct()
    {
        global $routes;
        $this->__routes = new Route();
        $this->__controller = $routes['default_controller'];
        $this->__action = 'index';
        $this->__params = [];

        $url = $this->handleUrl();
    }

    //lấy đường dẫn
    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    //đọc đường dẫn
    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->__routes->routeHandle($url);
        $urlArr = array_values(array_filter(explode('/', $url))); //tách đường dẫn
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }
        //Kiểm tra file Controller
        if (file_exists('App/Controllers/' . ($this->__controller) . '.php')) {
            require_once 'App/Controllers/' . ($this->__controller) . '.php';
            //Kiểm tra class Controller
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            }else{
                $this->showError();
            }
        } else {
            $this->showError();
        }
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        $this->__params = array_values($urlArr);

        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->showError();
        }
    }
    //Hiển thị lỗi
    public function showError($id = '404')
    {
        require_once 'Errors/' . $id . '.php';
    }
}
