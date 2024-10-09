<?php
  include("connection.php");

  $requestid = $_POST['requestid'];

  if($conn -> query("UPDATE requests SET status='Processing' WHERE id=$requestid")){
    echo json_encode(['status' => 'success', 'message' => 'Request Approved', 'description' => 'Request Successfully Approved']);
  }else {
    echo json_encode(['status' => 'error', 'message' => 'Approving Request Failed', 'description' => 'Were having a problem approving this request. Please contact the registrar or try again requesting after couple of minutes or hour.']);
  }


  $conn -> close(); 
?>