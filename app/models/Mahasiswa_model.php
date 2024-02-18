<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        // Sinkronisasi terhadap database setiap pemanggilan class
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM " .$this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query("SELECT * FROM ' . $this->table . ' WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $this->db->query("INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan)");
        // parameter pertama didapat dari attribute name dari input
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        // Jika insert berhasil dilakukan, maka method akan mereturn angka 1
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $this->db->query("DELETE FROM mahasiswa WHERE id = :id");
        // parameter pertama berasal dari parameter id pada query dan parameter kedua berasal dari argument method
        $this->db->bind('id', $id);

        $this->db->execute();

        // Jika delete berhasil dilakukan, maka method kan mereturn angka 1
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}