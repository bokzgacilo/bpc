<?php
  include("connection.php");

  $stuid = $_POST['id'];

  $delete = $conn -> query("DELETE FROM users WHERE id=$stuid");

  if($delete){
    echo "ok";
  }

  $conn -> close();
?>