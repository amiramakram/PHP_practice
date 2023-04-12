<?php 
 
    if(isset($_GET["errors"])){ 
        $errors = json_decode($_GET["errors"], true); 
    } 
    if(isset($_GET["old"])){ 
        $old_data = json_decode($_GET["old"], true); 
    } 
   
 
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


<div class="container">
    <div class="row">
      <div class="d-flex justify-content-center" ><p class="fs-1 " style="color: navy; font-weight: bolder;">Insertion of users</p></div>
<form method="post" action="insertUser.php" enctype="multipart/form-data">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >First Name</label>
    <input name='firstName' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="<?php if(isset($old_data['firstName'])) echo $old_data['firstName']?>">
    <span class="text-danger"> <?php if(isset($errors['firstName'])) echo $errors['firstName']; ?> </span>

    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="<?php if(isset($old_data['email'])) echo $old_data['email']?>">
    <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>

    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name='password' type="password" class="form-control" id="exampleInputPassword1">
    <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>
  </div class="mb-3">
  <label for="male">Male</label>
      <input type="radio" id="male" value="male" checked name='gender' />
      <label for="female">Female</label>
      <input type="radio" id="female" value="female" name='gender' />
  <div>

  </div>
  <div class="mb-3">
        <label class="form-label">User Image </label>

        <input type="file" name="image">

    </div>
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn" style="background-color: rgb(68, 108, 91);color: aliceblue; border-bottom:3px rgb(157, 172, 158) solid">Register</button>
</div>
</form>
<a  class="btn " style="background-color: rgb(68, 108, 91);color: aliceblue; border-bottom:3px rgb(157, 172, 158) solid ;width:10%;margin-left:45%" href="login.php">Login</a>

</div>
</div>