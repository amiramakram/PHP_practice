<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
// begin
echo'<h1>Check login</h1>';
// var_dump($_POST);
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
$formdata = [];
//this is for insert path

    if (isset($email) and empty($password)) {
        $errors['password'] = 'password required';
    }
    if (empty($email) and isset($password)) {
        $errors['email'] = 'email required';
    } else {
        $formdata['email'] = $email;
    }
   


if ($errors) {
    //convert error array to string
    $errors_str = json_encode($errors);
        $url = "Location:login.php?errors={$errors_str}";

    if ($formdata) {
        $old_data = json_encode($formdata);
        // not completed input data
        $url .= "&old={$old_data}";
    }
    header($url);

} else {
    $users=file('insertedUsers.txt');
$isLogin=false;
    foreach($users as $index=>$user){
        $users_data=explode(':',$user); 
        if( $users_data[2]==$email and $users_data[3]==$password ){
$isLogin=true;
header('Location:homeUser.php');

            break;
        }
     }
     if($isLogin){
        session_start();
        $_SESSION['usermail']=$email;
        $_SESSION['isLogin']=true;

     }
     else{
        header('Location:login.php');
     }


}


?>