<?php

require_once 'classes/EntitasTerbang.php';
require_once 'classes/Burung.php';
require_once 'classes/KakakTua.php';

use classes\EntitasTerbang;

function main()
{
    echo "Program Dijalankan <br/>";

    //$et = new EntitasTerbang();
    //$et->setNama('Entitas Terbang Tidak Diketahui');
    //$et->terbang();

    //$b = new Burung();
    //$b->terbang();
    //$b->mendarat();

    $jonie = new KakakTua(1);
    $jonie->setNama("Jonie");
    $jonie->terbang();
    $jonie->mendarat();
    $jonie->bersuara();
}

main();