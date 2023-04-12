<?php
if(isset($_GET["errors"])){ 
  $errors = json_decode($_GET["errors"], true); 
} 
if(isset($_GET["old"])){ 
  $old_data = json_decode($_GET["old"], true); 
} 
?>

<?php





echo "<div class='container fs-4'>";




try{
// delete row
// check id spaces

if(isset($_GET['ID'])){
  //error
  // $id = trim(strip_tags($_GET['ID']));
  // echo $id;
  echo $_GET['ID'];
}
// echo'________________';
// echo $_GET['ID'];

    $users=file('insertedUsers.txt');
foreach($users as $index=>$user){
   $users_data=explode(':',$user); 
   if( $users_data[0]==$_GET['ID']){
    unset($users[$index]);
    break;
   }
}

    $file=fopen('insertedUsers.txt','w');
    foreach($users as $user){
    fwrite($file,$user);
    }
    fclose($file);
    // header('Location:tableUser.php');
}catch(Exception $exception){
    echo $exception->getMessag();
}

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


<div class="container">
    <div class="row">
      <div class="d-flex justify-content-center" ><p class="fs-1 " style="color: navy; font-weight: bolder;">Update user</p></div>
<form method="post" action="insertUser.php" enctype="multipart/form-data">
  <div class="mb-3">
<input type="text" class="form-control" id="id" name="id" hidden
                    value="<?php if(isset($old_data['id'])) echo $old_data['id']; elseif(isset($_GET['ID']))echo $_GET['ID'];?>" 
             >
             <label for="exampleInputEmail1" class="form-label" >First Name</label>
    <input name='firstName' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="<?php if(isset($old_data['firstName'])) echo $old_data['firstName']; elseif(isset($_GET['firstName']))echo $_GET['firstName'];?>">
    <span class="text-danger"> <?php if(isset($errors['firstName'])) echo $errors['firstName']; ?> </span>

    
  </div> 
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="<?php if(isset($old_data['email'])) echo $old_data['email']; elseif(isset($_GET['email']))echo $_GET['email'];?>">
    <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>

    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name='password' type="password" class="form-control" id="exampleInputPassword1">
    <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>
  </div>
  </div class="mb-3">
  <label for="male">Male</label>
      <input type="radio" id="male" value="male" checked name='gender' />
      <label for="female">Female</label>
      <input type="radio" id="female" value="female" name='gender' />
      <div class="mb-3">
        <label class="form-label">User Image </label>

        <input type="file" name="image">

    </div>
  <div>

  <div class="d-flex justify-content-center">
  <button type="submit" class="btn" style="background-color: rgb(68, 108, 91);color: aliceblue; border-bottom:3px rgb(157, 172, 158) solid">Confirm your new data</button>
</div>
</form>
</div>
</div>
<!-- _________________________________________

echo "<div class='container fs-4'>";
echo"<h1>Edit user</h1>";
echo "<form method='post' action='insertUser.php'>
<div class='mb-3'>
  <label for='exampleInputEmail1' class='form-label' >Update your email</label>
  <input name='emailNew' type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
  <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
</div>
<div class='mb-3'>
  <label for='exampleInputPassword1' class='form-label'>Update your Password</label>
  <input name='passwordNew' type='text' class='form-control' id='exampleInputPassword1'>
</div>
<input name='id' type='text' class='form-control' id='exampleInputPassword1'>
<div class='d-flex justify-content-center'>
<button type='submit' class='btn' style='background-color: rgb(68, 108, 91);color: aliceblue; border-bottom:3px rgb(157, 172, 158) solid'>Confirm your new data</button>
</div>
</form>";




    $file=fopen('insertedUsers.txt','a');
   
    $data="{$id}:{$_POST["emailNew"]}:{$_POST["passwordNew"]}".PHP_EOL;
    fwrite($file,$data);
    fclose($file);



   



 -->
