<?php

namespace src;

use framework\Model;
use PDO;

class KontakModel extends Model
{
    public function tambahKontakBaru($nama, $nomorTelepon, $email, $alamat)
    {
        // Buat dulu SQL dari parameter method
        $sql = "INSERT INTO kontak (nama, nomor_telepon, email, alamat) 
                    VALUES ('$nama', '$nomorTelepon', '$email', '$alamat');";

        // Jalankan SQL
        $this->_dbConnection->exec($sql);
    }

    public function ambilSemuaKontak()
    {
        // Buat dulu SQL-nya
        $sql = "SELECT * FROM kontak";

        // Jalankan SQL
        $statement = $this->_dbConnection->prepare($sql);
        $success = $statement->execute();

        // Ambil semua data yang terbaca
        if($success)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
}