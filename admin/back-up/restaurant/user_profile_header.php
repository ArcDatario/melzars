<li class="nav-item dropdown pe-3">

  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <img src="../admin_profile/<?php echo $_SESSION['profile']; ?>" alt="Profile" class="rounded-circle" width="40" height="70">
    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user_name']; ?></span>
  </a><!-- End Profile Iamge Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
      <h6><?php echo $_SESSION['user_name']; ?></h6>
      <span><?php echo $_SESSION['role']; ?></span>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <li>
      <a class="dropdown-item d-flex align-items-center" href="restaurant_profile.php">
        <i class="bi bi-person"></i>
        <span>My Profile</span>
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li>
      <a class="dropdown-item d-flex align-items-center" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>

  </ul><!-- End Profile Dropdown Items -->
</li>
