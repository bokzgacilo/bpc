<?php
  include("connection.php");

  $requestid = $_POST['requestid'];

  if($conn -> query("UPDATE requests SET status='Completed' WHERE id=$requestid")){
    echo json_encode(['status' => 'success', 'message' => 'Request Completed', 'description' => 'Request completed and is now ready to pickup by the client.']);
  }else {
    echo json_encode(['status' => 'error', 'message' => 'Completing Request Failed', 'description' => 'Were having a problem completing this request. Please contact the registrar or try again requesting after couple of minutes or hour.']);
  }


  $conn -> close(); 
?>