<a href="rooms.php" class="bk-btn account">Booking Now</a>
<div class="language-option">
<img id="user_image_pc" src="user_images/<?php echo $user_image; ?>" alt="User Image">
<span id="user_fullname_pc" style="text-transform:none !important;"><?php echo $user_fullname; ?><i class="fa fa-angle-down"></i></span>
<div class="flag-dropdown">
<ul>
<li><a href="#" class="account" onclick="showUserDetails(<?php echo $_SESSION['user_id']; ?>)" style="text-transform:none; padding-right: 50% !important;">Account</a></li>
<li><a href="logout.php" class="text-danger logout" style="text-transform:none; padding-right: 60% !important;">Logout</a></li>
</ul>
</div>
</div>
