<?php

namespace src;

use Kontak;
use PDO;
use PDOException;

class Model
{
    private $_connection;

    public function __construct()
    {
        // Membuat koneksi ke database
        $this->_initConnection();
    }

    private function _initConnection()
    {
        // Seting database
        $host = 'localhost:8889'; // <-- Defaultnya 3306
        $user = 'root';
        $pass = 'root'; // <-- Defaultnya kosong ''
        $dbName = 'buku_kontak';

        // Objek untuk menampung koneksi ke DB
        $connection = null;

        // Coba untuk membuat koneksi ke DB
        try
        {
            $dsn = "mysql:host={$host};dbname={$dbName}";
            $connection = new PDO($dsn, $user, $pass);
            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
        catch (PDOException $e)
        {
            echo "Koneksi gagal! Detail: {$e->getMessage()}";
            die(1); // Hentikan program!
        }

        // Memindahkan $connection ke atribut class $_connection;
        $this->_connection = $connection;
    }

    public function findAllKontak()
    {
        // Baca semua data di tabel kontak
        $sql = "SELECT * FROM kontak";
        $statement = $this->_connection->prepare($sql);
        $success = $statement->execute();
        $data = []; // Array kosong untuk menampung data yang di-SELECT.
        if($success)
        {
            // Hasil query dalam bentuk array asosiatif.
            // Datanya ada banyak baris
            $records = $statement->fetchAll(
                PDO::FETCH_ASSOC
            );

            // Ubah array asosiatif ke array objek Kontak.
            foreach ($records as $row)
            {
                $k = new \Kontak();
                $k->setId($row['id']);
                $k->setNama($row['nama']);
                $k->setNomorTelepon($row['nomor_telepon']);
                $k->setEmail($row['email']);
                $k->setAlamat($row['alamat']);

                // Masukkan objek Kontak ke array $data
                $data[] = $k;
            }
        }

        return $data;
    }

    public function addNewKontak(Kontak $kontak)
    {
        $nama         = $kontak->getNama();
        $nomorTelepon = $kontak->getNomorTelepon();
        $email        = $kontak->getEmail();
        $alamat       = $kontak->getAlamat();

        // Buat SQL-nya untuk INSERT ke DB
        $sql = "INSERT INTO 
                kontak (nama, nomor_telepon, email, alamat)
                VALUES ('$nama', '$nomorTelepon', '$email', '$alamat')";

        // Jalankan SQL!
        $this->_connection->exec($sql);
    }
}