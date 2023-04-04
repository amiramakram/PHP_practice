<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
// begin

var_dump($_POST);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
$formdata = [];
//this is for insert path
if ($_POST['id']) {
    if (empty($_POST['id']) and isset($_POST['password']) and isset($_POST['email']) ) {
        $errors['id'] = 'id required';
    } else {
        $formdata['id'] = $_POST['id'];
    }

    if (isset($email) and empty($password) and isset($_POST['id'])) {
        $errors['password'] = 'password required';
    }
    if (empty($email) and isset($password) and isset($_POST['id'])) {
        $errors['email'] = 'email required';
    } else {
        $formdata['email'] = $email;
    }
}
// this is for myform path
else{
    if (isset($email) and empty($password)) {
        $errors['password'] = 'password required';
    }
    if (empty($email) and isset($password)) {
        $errors['email'] = 'email required';
    } else {
        $formdata['email'] = $email;
    }
}



if ($errors) {
    //convert error array to string
    $errors_str = json_encode($errors);
    var_dump($errors_str);
    if($_POST['id']){
        $url="Location:editUsers.php?errors={$errors_str}";
    }
    else{
    $url = "Location:myForm.php?errors={$errors_str}";
    }
    if ($formdata) {
        $old_data = json_encode($formdata);
        // not completed input data
        $url .= "&old={$old_data}";
    }
    header($url);
} else {
    ### I need to save the users data to the file

    try {
        if ($_POST['id']) {
            $fileobj = fopen('insertedUsers.txt', 'a');
            $id = $_POST['id'];
            $user_data = "{$id}:{$email}:{$password}" . PHP_EOL;
            fwrite($fileobj, $user_data);
            fclose($fileobj);
            header('Location:tableUser.php');
        } else {
            $fileobj = fopen('insertedUsers.txt', 'a');

            $id = time();
            $user_data = "{$id}:{$email}:{$password}" . PHP_EOL;
            fwrite($fileobj, $user_data);
            fclose($fileobj);

            header('Location:tableUser.php');
        }

        //    readfile('users.txt');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// ################## validation --> must be implement frontend and backend and database

// save data to a file==>Database
// try{

//     $file=fopen('insertedUsers.txt','a');
//     $ID=time();insertedUsers.txt
//     $data="{$ID}:{$email}:{$password}".PHP_EOL;
//     fwrite($file,$data);
//     fclose($file);
//     header('Location:tableUser.php');
//     // readfile('insertedUsers.txt');

// }catch(Exception $exception){
//     echo $exception->getMessag();
// }

?>
