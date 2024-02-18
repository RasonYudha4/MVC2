<?php

// Inheritance yang bertujuan untuk memungkinkan class home menggunakan method view
class About extends Controller {
    public function index($nama = "Heri", $pekerjaan = "Pejabat", $umur = 30) {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = "About";
        // Method view yang digunakan untuk memanggil file di folder views
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page() {
        // Method view yang digunakan untuk memanggil file di folder views
        $this->view('templates/header');
        $this->view('about/page');
        $this->view('templates/footer');
    }
}