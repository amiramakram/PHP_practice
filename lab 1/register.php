<?php
   
    $f_name = $_POST["firstname"];
    $l_name = $_POST["lastname"];
    $address = $_POST["Address"];
    $country = $_POST["country"];
    $gender = $_POST["Gender"];
    $skills = $_POST["Skills"];
    $arrLength = count($skills);
    $username = $_POST["Username"];
    $password = $_POST["password"];
    $department = $_POST["Department"];

    if( $gender == "Male" )
    {
        echo"Thanks Mr  $f_name $l_name","<br>";
    }
    else
    {
        echo"Thanks Miss  $f_name $l_name","<br>";
    }
    echo"Please Review your Information","<br>";
    echo"Name : $username","<br>";
    echo"Address :  $address","<br>";
    echo"Your Skills :  ";
    for ($x = 0; $x < $arrLength; $x++) {
          echo"          $skills[$x] <br>";
      } 
    echo"Department  :  $department ","<br>";
   
    