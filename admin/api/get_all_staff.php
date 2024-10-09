<?php
  include("connection.php");

  $select_all = $conn -> query("SELECT * FROM staff");

  if($select_all -> num_rows > 0){
    while($row = $select_all -> fetch_assoc()){
      echo "
        <tr>
          <td class='align-middle'>
            <img src='../images/staffs/mark.zuckerberg.jpg' />
          </td>
          <td class='align-middle'>".$row['name']."</td>
          <td class='align-middle'>".$row['position']."</td>
          <td class='align-middle'>".$row['username']."</td>
          <td class='align-middle'>".$row['password']."</td>
          <td class='align-middle'>
            <button class='btn btn-primary btn-sm mr-4'>Edit</button>
            <button class='btn btn-danger btn-sm'>Delete</button>
          </td>
        </tr>
      ";
    }
  }
?>