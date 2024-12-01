<?php
// File ini di dalam folder bernama 'classes'
// Maka dari itu sebaiknya namespace-nya adalah juga 'classes'

namespace classes;

abstract class EntitasTerbang
{
    protected $nama;
    protected $jumlahSayap;

    // Constructor
    public function __construct($nama = '', $jumlahSayap = 0)
    {
        $this->nama        = $nama;
        $this->jumlahSayap = $jumlahSayap;
    }

    public abstract function terbang();
    public abstract function mendarat();

    // Getter dan setter
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }
}
