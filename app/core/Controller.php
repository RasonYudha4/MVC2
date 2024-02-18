<?php

// Sebuah class controller yang berfungsi untuk memanggil file dari folder views namun digunakan pada folder controller
class Controller {
    // method untuk memanggil parameter sebagai data untuk ditampilkan
    public function view($view, $data = []) {
        // Kita berada di file index.php
        require_once ('../app/views/' . $view . '.php');
    }

    //method untuk menentukan model yang akan digunakan dan mengembalikan object dari class model yang dipilih
    public function model($model) {
        require_once('../app/models/' . $model . '.php');
        return new $model;
    }
}