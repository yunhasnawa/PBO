<?php

namespace framework;

use PDO;

class Model
{
    protected $_dbConnection;

    public function __construct()
    {
        // Data Set Name (DSN)
        $dsn = 'mysql:host=localhost:8889;dbname=buku_kontak';
        $this->_dbConnection = new PDO(
            $dsn,
            'root', 'root'
        );

        //echo "Koneksi berhasil!<br/>";
    }
}