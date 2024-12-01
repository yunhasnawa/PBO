<?php

use classes\EntitasTerbang;

abstract class Burung extends EntitasTerbang
{
    protected $panjangParuh;

    public function __construct($panjangParuh = 0)
    {
        // Harus memanggil constructor class induk
        parent::__construct("Birdie", 2);

        $this->panjangParuh = $panjangParuh;
    }

    public function terbang() // Method overriding
    {
        echo "Burung bernama {$this->nama}, terbang: Wuss!<br/>";
    }

    public function mendarat() // Method overriding
    {
        echo "Burung bernama {$this->nama}, mendarat: Toss!<br/>";
    }

    public abstract function bersuara();
}