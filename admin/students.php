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
      <div class="row">
        <h4>Upload Student List</h4>
      </div>
      <form  class="row mt-2" action="../api/post_batch_excel_upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group col-4">
            <input type="file" name="file" id="file" class="form-control" accept=".xlsx, .xls" required>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary">Upload and Import</button>
        </div>
      </form>
      <table class="mt-4 table table-bordered text-center">
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
    function deleteStudent(stuid){
      Swal.fire({
        title: "Do you want to delete the student",
        icon: "info",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Yes, Delete It",
        denyButtonText: `Don't save`
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'post',
            url: 'api/post_delete_student.php',
            data: {
              id : stuid
            },
            success: response => {
              if(response === 'ok'){
                alert('Student deleted!')
                location.reload();
              }
            }
          })
        }
      });
    }

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