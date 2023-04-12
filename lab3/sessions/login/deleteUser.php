<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';




echo "<div class='container fs-4'>";
echo"<h1>Delete user</h1>";

var_dump($_GET);


try{
// delete row

    $id=$_GET["ID"];
    $users=file('insertedUsers.txt');
foreach($users as $index=>$user){
   $users_data=explode(':',$user); 
   if( $users_data[0]==$id){
    unset($users[$index]);
    break;
   }
}

    $file=fopen('insertedUsers.txt','w');
    foreach($users as $user){
    fwrite($file,$user);
    }
    fclose($file);
    header('Location:tableUser.php');


}catch(Exception $exception){
    echo $exception->getMessag();
}

?>