<?php

// Kode untuk menampilkan semua error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'framework/App.php';
require_once 'framework/Controller.php';
require_once 'framework/View.php';
require_once 'framework/Model.php';

require_once 'src/BerandaController.php';
require_once 'src/KontakModel.php';
require_once 'src/AboutController.php';

use framework\App;

$app = new App();

// Atur routes-nya
$app->setRoutes([
    '/buku-kontak-pbo/'          => 'BerandaController@index',
    '/buku-kontak-pbo/index.php' => 'BerandaController@index',
    '/buku-kontak-pbo/tentang-kami'     => 'AboutController@index'
]);

$app->run();