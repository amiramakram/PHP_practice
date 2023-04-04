<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';




echo "<div class='container fs-4'>";
echo"<h1>All users</h1>";

try{

   $users=file(filename:"insertedUsers.txt");
   
   echo "<table class='table'>
   <tr>
   <th>ID</th> <th>USER NAME</th>
   <th>PASSWORD</th> <th>EDIT</th> <th>DELETE</th>
   </tr>";

//    looping in data to print in my table

foreach($users as $user){
    echo'<tr>';
    $datas = explode(':', $user);
    foreach($datas as $rowData){
        echo"<td>{$rowData}</td>";
    }
    echo"<td><a class='btn btn-warning'
    href='editUsers.php?ID={$datas[0]} &email={$datas[1]}'>EDIT</a></td>
    <td><a class='btn btn-danger' href='deleteUser.php?ID={$datas[0]}'>DELETE</a></td>
    
    </tr>";

}
echo"</table>";

}catch(Exception $exception){
    echo $exception->getMessag();
}
?>
<a href="myForm.php" class="btn btn-primary" > Insert user</a>
