<?php

// Inheritance yang bertujuan untuk memungkinkan class home menggunakan method view
class Home extends Controller {
    public function index() {
        $data['judul'] = "Home";
        $data['nama'] = $this->model('User_model')->getUser();
        // Method view yang digunakan untuk memanggil file di folder views
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}