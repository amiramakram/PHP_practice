<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';




echo "<div class='container fs-4'>";
echo"<h1>Edit user</h1>";
echo "<form method='post' action='tableUser.php'>
<div class='mb-3'>
  <label for='exampleInputEmail1' class='form-label' >Update your email</label>
  <input name='emailNew' type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
  <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
</div>
<div class='mb-3'>
  <label for='exampleInputPassword1' class='form-label'>Update your Password</label>
  <input name='passwordNew' type='text' class='form-control' id='exampleInputPassword1'>
</div>

<div class='d-flex justify-content-center'>
<button type='submit' class='btn' style='background-color: rgb(68, 108, 91);color: aliceblue; border-bottom:3px rgb(157, 172, 158) solid'>Confirm your new data</button>
</div>
</form>";

try{
    
var_dump($_POST);
    
        $id=$_GET["ID"];
        $users=file('insertedUsers.txt');
    foreach($users as $index=>$user){
       $users_data=explode(':',$user); 
       if( $users_data[0]==$id){
        unset($users[$index]);
       }}
$file=fopen('insertedUsers.txt','w');
    foreach($users as $user){
    fwrite($file,$user);
    }

    $file=fopen('insertedUsers.txt','a');
   
    $data="{$id}:{$_POST["emailNew"]}:{$_POST["passwordNew"]}".PHP_EOL;
    fwrite($file,$data);
    fclose($file);
    // header('Location:tableUser.php');



   

}catch(Exception $exception){
    echo $exception->getMessag();
}



?>