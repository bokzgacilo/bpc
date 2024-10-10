<style>
  .sidebar > a {
    padding: 1rem;
    cursor: pointer;
    color: #fff !important;
    font-size: 18px;
    text-decoration: none;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 0.75rem;
  }

  .sidebar > a:hover {
    background-color: #073000;
  }

  .sidebar {
    display: flex;
    flex-direction: column;
    background-color: #073000;
    position: relative;
    top: 0;
    left: 0;
  }

  .sidebar > img {
    margin-top: 2rem;
  }

  .sidebar > h6 {
    color: #fff;
    margin-top: 1rem;
    text-align: center;
  }
</style>
<div class="sidebar col-2">
  <img src="images/bpc-logo.png" width="120px" height="120px" class="align-self-center">
  <h2 class="mt-4 mb-4 align-self-center text-white ">Menu</h2>
  <a href="request.php">
    <i class="fa-regular fa-file"></i>
    <span>Request</span>
  </a>
  <a href="my-request.php">
    <i class="fa-regular fa-file"></i>
    <span>My Requests</span>
  </a>
  <a href="profile.php">
    <i class="fa-regular fa-user"></i>
    <span>Profile</span>
  </a>
  <!-- <a href="notifications.php">
    <i class="fa-regular fa-bell"></i>
    <span>Notifications</span>
  </a> -->
  <a class="logoutButton">
    <i class="fa-solid fa-power-off"></i>
    <span>Log Out</span>
  </a>

  <h6>BPC E-Registrar 2024</h6>
</div>

<script>
  $(".logoutButton").on("click", function(){
    Swal.fire({
      title: "Are you sure you want to logout?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, logout"
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "index.html"
      }
    });
  })
</script>