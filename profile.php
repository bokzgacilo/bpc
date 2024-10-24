<?php
  include("api/connection.php");
  session_start();

  $clientid = $_SESSION['clientid'];

  $select = $conn -> query("SELECT * FROM users WHERE id=$clientid LIMIT 1");
  $row = $select -> fetch_assoc();

  $conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - BPC E-Registrar</title>
  <?php include('reusables/client-static-loader.php'); ?>
</head>
<body>
  
  <style>
    main {
      min-height: 100vh;
    }

    .avatar {
      display: flex;
      flex-direction: row;
      gap: 1rem;
    }

    .avatar > img {
      width: 250px;
      height: 250px;
      object-fit: cover;
    }
  </style>

  <main class="container-fluid d-flex flex-lg-row flex-column p-0">
    <?php include("reusables/client-sidebar.php"); ?>
    <div class="col-12 col-lg-10 p-4">
      <h2>Profile</h2>
      <hr />
      <div>
        <div class="mt-2 avatar">
          <img class="img-fluid" src="<?php echo $row['image_url']; ?>" />
          <div class="avatarform">
          </div>
        </div>
        <input class="form-control" type="file" name="image" />
        <button class="mt-2 btn btn-primary">Update Avatar</button>

        <input type="text" class="mt-2 form-control" value="<?php echo $row['stuname']; ?>" readonly />
        <input type="text" class="mt-2  form-control" value="<?php echo $row['stuid']; ?>" readonly />
        <input type="text" class="mt-2  form-control" value="<?php echo $row['stuemail']; ?>" readonly />
        <input type="text" class="mt-2  form-control" value="<?php echo $row['stupassword']; ?>" readonly />
        <button class="btn btn-success mt-4 ">Confirm Changes</button>
      </div>
     
    </div>
  </main>
  <script>
    
  </script>
</body>
</html>