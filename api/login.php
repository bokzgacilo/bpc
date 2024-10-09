<?php
  include("connection.php");
  session_start();

  $stuid = $_POST['stuid'];
  $stupassword = $_POST['stupassword'];

  $select = $conn -> query("SELECT * FROM users WHERE stuid='$stuid' AND stupassword='$stupassword' LIMIT 1");
  
  if($select -> num_rows > 0){
    $row = $select -> fetch_assoc();

    $_SESSION['stuid'] = $row['stuid'];
    $_SESSION['clientid'] = $row['id'];

    echo json_encode(array("status" => "success", "message" => "Successfully Logged In", "description" => "Redirecting to Dashhboard."));
  }else {
    echo json_encode(array("status" => "error", "message" => "Invalid Login Credential", "description" => "Please try again. Make sure your Student Id and Password are matched."));
  }

  $conn -> close();
?>