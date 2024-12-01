<?php
// Tampilkan semua error PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/App.php';
require_once 'src/Model.php';
require_once 'src/Kontak.php';
require_once 'src/View.php';
require_once 'src/Controller.php';

use src\App;

$app = new App();
$app->run();
