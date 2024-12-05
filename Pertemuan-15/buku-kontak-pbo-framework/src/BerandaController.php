<?php

namespace src;

use framework\Controller;
use framework\View;

class BerandaController extends Controller
{
    private $_model;

    public function __construct()
    {
        parent::__construct();

        $this->_model = new KontakModel();
    }

    public function index()
    {
        $data = $_POST;

        // Kalau button submit diklik..
        if(isset($data['submit']))
        {
            $this->_model->tambahKontakBaru(
                $data['nama'],          // nama
                $data['nomor_telepon'], // nomor telepon
                $data['email'],         // email
                $data['alamat']         // alamat
            );
        }

        // Data untuk ditampilkan di tabel. Terlepas ada submit atau tidak
        $daftarKontak = $this->_model->ambilSemuaKontak();

        $this->view->setTemplate('template/index_template.php');
        $this->view->setData(['daftarKontak' => $daftarKontak]);
        $this->view->render();
    }
}