<?php

namespace src;

use Kontak;

class Controller
{
    private $_model;
    public function __construct()
    {
        $this->_model = new Model();
    }

    public function index()
    {
        if(isset($_POST['submit']))
            $this->_saveKontak();

        $kontakList = $this->_model->findAllKontak();

        $view = new View('template/index_template.php');

        // Isi data yang akan ditampilkan ke template
        $view->setData([
            'subtitle'   => 'Beranda',
            'kontakList' => $kontakList
        ]);

        $view->render();
    }

    private function _saveKontak()
    {
        //Ambil data dari form
        $id           = $_POST['id'];
        $nama         = $_POST['nama'];
        $nomorTelepon = $_POST['nomor_telepon'];
        $email        = $_POST['email'];
        $alamat       = $_POST['alamat'];

        if(empty($id)) // ID-nya kosong, berarti insert
        {
            // Insert data
            $k = new Kontak();
            $k->setNama($nama);
            $k->setNomorTelepon($nomorTelepon);
            $k->setEmail($email);
            $k->setAlamat($alamat);

            // Lempar ke model untuk disimpan
            $this->_model->addNewKontak($k);
        }
        else
        {
            // Update data
            //$this->_model->edit($k);
        }
    }
}