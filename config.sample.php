<?php
/*
* Use the lpstat command to see a list of available printers:
* `lpstat -p -d`
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(E_ERROR);
session_start();

ini_set('safe_mode', 'Off');
define("PRINTER", 'EPSON_L120_Series');
define("FILES_DIR", __DIR__.'/files/');
define("ROOT", __DIR__.'/');
define("THUMBNAILS_DIR", __DIR__.'/thumbnails/');


include 'db.php';
// make a connection to mysql here
$options = [
    'username' => 'root',
    'database' => 'printervendo',
    'password' => '',
    'type' => 'mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306'
];
// print_r($_SESSION);
$db = new Database($options);

$allowed_types = [
    'application/pdf', 
    'image/jpeg', 
    'image/png', 
    'image/gif',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/msword',
    'application/doc',
    'application/ms-doc',    
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'application/x-excel',
    'application/x-msexcel',    
    'application/vnd.ms-excel',
    'application/excel',
    'application/vnd.openxmlformats-officedocument.presentationml.presentation', 
    'application/x-mspowerpoint',    
    'application/vnd.ms-powerpoint',
    'application/mspowerpoint',
    'application/powerpoint'
];
function logger($type,$content,$db){
    $db->insert('log',['type'=>$type,'content'=>$content]);
}
include 'controller/getclient.php'


?>
