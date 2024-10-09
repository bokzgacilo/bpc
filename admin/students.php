<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students - BPC E-Registrar</title>
  <?php include("static-loader.php"); ?>
</head>
<body>
  
  <style>
    main {
      min-height: 100vh;
    }

    .panel-header {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }

    .search-form {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 0.5rem;
    }

    td > img {
      width: 50px;
      height: 50px;
      border-radius: 50px;
    }

  </style>

  <main class="container-fluid d-flex flex-row p-0">
    <?php include("../reusables/admin-sidebar.php"); ?>
    
    <div class="col-10 p-4">
      <div class="panel-header">
        <h2>List of Students</h2>
        <div class="search-form">
          <input type="search" class="form-control" placeholder="Start searching" />
          <button class="btn btn-primary">Search</button>
        </div>
      </div>
      <hr class="mb-4" />
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-body">
          
        </tbody>
      </table>
    </div>
  </main>
  <script>
    $(document).ready(function(){
      $.ajax({
        type: "get",
        url: "api/get_all_student.php",
        success: response => {
          $(".table-body").html(response)
        }
      })
    })
  </script>
</body>
</html>