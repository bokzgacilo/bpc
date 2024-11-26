<?php
  include("connection.php");

  header('Content-Type: application/json');

  $select_all = $conn->query("SELECT * FROM requests WHERE status='Processing'");

  $data = [];
  while ($row = $select_all->fetch_assoc()) {
      $data[] = $row;
  }
  
  echo json_encode([
    "data" => $data
  ]);
?>