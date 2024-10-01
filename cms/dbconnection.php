<?php

  $servername ="localhost";
  $username ="root";
  $password ="";
  $db_name = "admin";

  $conn = new mysqli($servername, $username,$password,$db_name);

  if($conn == false){
    die('Connection fail'.$conn);
  }

?>