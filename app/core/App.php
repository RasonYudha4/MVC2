<?php

class App {
    // Sebagai url defaul apabila user tidak memberikan controller maupun method
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();
        
        // Controller (mengecek apabila parameter pertama setelah url di public/index.php ada atau tidak dan berfungsi untuk memilih file di folder controller)
        if(file_exists('../app/controllers/'. $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Apabila tidak ada parameter pertama maka akan digunakan nilai dari controller default
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method (mengecek apabila parameter kedua ada atau tidak dan berfungsi untuk memanggil fungsi dari file controller yang dipilih)
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Parameter (mengecek apabila parameter setelah method ada atau tidak dan berfungsi untuk mengisi parameter fungsi dari file yang dipilih)
        if(!empty($url)) {
            $this->params = array_values($url);
        }

        // fungsi menjalankan controller, method, dan param
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}