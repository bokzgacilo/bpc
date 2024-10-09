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

  .avatar {
    padding: 1rem;
    background-color: #fff;
    margin-top: 2rem;
  }
</style>
<div class="sidebar col-2">
  <img src="../images/bpc-logo.png" width="64px" height="64px" class="align-self-center">
  <h2 class="mt-4 mb-4 align-self-center text-white ">Menu</h2>

  <a href="request.php">
    <i class="fa-regular fa-file"></i>
    <span>Requests</span>
  </a>
  <a href="processing.php">
    <i class="fa-regular fa-file"></i>
    <span>Processing</span>
  </a>
  <a href="archive.php">
    <i class="fa-regular fa-file"></i>
    <span>Archive</span>
  </a>
  <a href="staff_management.php">
    <i class="fa-regular fa-user"></i>
    <span>Staff Management</span>
  </a>
  <a href="students.php">
    <i class="fa-regular fa-user"></i>
    <span>User Management</span>
  </a>
  <!-- <a href="reports.php">
    <i class="fa-regular fa-file"></i>
    <span>Reports</span>
  </a> -->
  <!-- <a href="notifications.php">
    <i class="fa-regular fa-bell"></i>
    <span>Notifications</span>
  </a> -->
  <a href="index.html">
    <i class="fa-solid fa-power-off"></i>
    <span>Log Out</span>
  </a>

  <h6>BPC E-Registrar 2024</h6>
</div>
