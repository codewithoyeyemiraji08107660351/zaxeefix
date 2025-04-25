<?php

$error = 'Could not connect to database';

$con=mysqli_connect("localhost", "root", "oyeyemi", "repair_shop");

if(!$con){
     die($error.mysqli_connect_error());
}
   

?>