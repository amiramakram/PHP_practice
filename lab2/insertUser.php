<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
// begin

echo "<h2>hello</h2>";
var_dump($_POST);


// save data to a file==>Database
try{

    $file=fopen('insertedUsers.txt','a');
    // $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    $ID=time();
    $data="{$ID}:{$_POST["email"]}:{$_POST["password"]}".PHP_EOL;
    fwrite($file,$data);
    fclose($file);
    header('Location:tableUser.php');
    // readfile('insertedUsers.txt');

}catch(Exception $exception){
    echo $exception->getMessag();
}








?>