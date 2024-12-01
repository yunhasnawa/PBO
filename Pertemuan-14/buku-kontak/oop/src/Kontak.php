<?php

// Class entity
// Fungsinya hanya untuk menyimpan data
// Property-nya: id, nama, nomorTelepon, email, alamat

class Kontak
{
    private $_id;
    private $_nama;
    private $_nomorTelepon;
    private $_email;
    private $_alamat;

    // default constructor
    public function __construct()
    {
    }

    // Getter & Setter
    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getNama()
    {
        return $this->_nama;
    }

    public function setNama($nama)
    {
        $this->_nama = $nama;
    }

    public function getNomorTelepon()
    {
        return $this->_nomorTelepon;
    }

    public function setNomorTelepon($nomorTelepon)
    {
        $this->_nomorTelepon = $nomorTelepon;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getAlamat()
    {
        return $this->_alamat;
    }

    public function setAlamat($alamat)
    {
        $this->_alamat = $alamat;
    }
}
