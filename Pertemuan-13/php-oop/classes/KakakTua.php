<?php

class KakakTua extends Burung
{
    public function __construct($panjangParuh = 0)
    {
        parent::__construct($panjangParuh);
    }

    public function bersuara()
    {
        echo "Kakak tua bernama {$this->nama} bersuara: 'Mantap Jiwa'<br/>";
    }
}