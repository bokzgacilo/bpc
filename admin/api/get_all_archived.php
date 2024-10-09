<?php
  include("connection.php");

  $select_all = $conn -> query("SELECT * FROM requests WHERE status='Archived' OR status='Completed' OR status='Cancelled'");

  if($select_all -> num_rows > 0){
    while($row = $select_all -> fetch_assoc()){
      echo "
        <tr>
          <td class='align-middle'>".$row['request_id']."</td>
          <td class='align-middle'>".$row['client_name']."</td>
          <td class='align-middle'>".$row['document_type']."</td>
          <td class='align-middle'>".$row['request_date']."</td>
          <td class='align-middle'>".$row['status']."</td>
          <td class='align-middle'>
            <a class='btn btn-primary btn-sm mr-4' href='view.php?request_id=".$row['request_id']."'>View</a>
          </td>
        </tr>
      ";
    }
  }
?>