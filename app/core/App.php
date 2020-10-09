<?php

class App
{
    //Inisialisasi Default Method, Controller, dan Param
    protected $controller = "Frs";
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //Mendapatkan Pecahan Request URL
        $url = $this->parseURL();

        //Mengekcek Apakah URL Kosong 
        if (isset($url[0]) == NULL) {
            $url[0] = "index";
        }

        //controller
        if (file_exists('app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //jalankan contoller dan method , serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        //Mengecek Request URL
        if (isset($_GET['url'])) {

            //Menghilangkan "/" Di akhir URL
            $url = rtrim($_GET['url'], '/');

            //Menetralkan Request URL
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Memecah Request URL Ke dalam Array
            $url = explode('/', $url);

            //Mengembalikan Nilai
            return $url;
        }
    }
}
