<?php
// Start session


include "admin_session.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Melzar's Mountain Resort</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/new.css" rel="stylesheet">
</head>
 <!-- CSS for styling the modal -->
 <style>
 /* CSS for enlarged image */
 #enlarged-image {
   display: none;
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: rgba(0, 0, 0, 0.8);
   z-index: 9999;
   text-align: center;
}

#enlarged-image-container {
   position: relative;
   display: inline-block;
   vertical-align: middle;
   max-width: 50%;
   max-height: 50%;
}

#enlarged-image img {
   max-width: 80%;
   max-height: 80%;
   margin: 2% auto;
   display: block;
}

.nav-btn {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   background: transparent;
   border: none;
   color: #fff;
   font-size: 18px;
   cursor: pointer;
   z-index: 10000;
}

#prev-btn {
   left: 10px;
   font-size: 40px;
}

#next-btn {
   right: 10px;
   font-size: 40px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 40px;
    color: #fff;
    background: transparent;
    border: none;
    cursor: pointer;
    z-index: 10000;
}





.form-group {
   margin-bottom: 10px;
   position: relative;
 }

 .modal_label {
   display: inline-block;
   width: 100%;
   font-size: 0.9rem;
   position: absolute;
   top: 0;
   left: 0;
   margin-bottom: 5px; /* Optional: Add some space between label and input */
 }

.swal2-input {
   width: calc(88% - 10px); /* Adjust the width as needed */
   margin-top: 20px;
   font-size:1rem;
   border-radius:6px;
   color:black;
 /* Optional: Adjust the margin to separate label and input */
 }

 .images-row {
  display: flex;
  justify-content: space-between;
}

.images-row .form-group {
  flex: 1;
  margin-right: 10px; /* Optional: Add some space between images */
}

.images-row img {
  width: 100%;
  height: 120px;
  max-width: 120px; /* Adjust the max-width as needed */
  max-height: 120px; /* Adjust the max-height as needed */
}
.images-row input[type="file"] {
   width: 70%;
   margin-top: 10px;
   margin-left: 4px;
   border:none;
    /* Optional: Adjust the margin to separate input and label */
 }
 @media (max-width: 400px) {
     .images-row input[type="file"] {
       width: 100%; /* Adjust the width as needed */
     }
   }






   .button {
     position: relative;
     width: 150px;
     height: 40px;
     cursor: pointer;
     display: flex;
     align-items: center;
     border: 1px solid #34974d;
     background-color: #3aa856;
   }

   .button, .button__icon, .button__text {
     transition: all 0.3s;
   }

   .button .button__text {
     transform: translateX(30px);
     color: #fff;
     font-weight: 600;
   }

   .button .button__icon {
     position: absolute;
     transform: translateX(109px);
     height: 100%;
     width: 39px;
     background-color: #34974d;
     display: flex;
     align-items: center;
     justify-content: center;
   }

   .button .svg {
     width: 30px;
     stroke: #fff;
   }

   .button:hover {
     background: #34974d;
   }

   .button:hover .button__text {
     color: transparent;
   }

   .button:hover .button__icon {
     width: 148px;
     transform: translateX(0);
   }

   .button:active .button__icon {
     background-color: #2e8644;
   }

   .button:active {
     border: 1px solid #2e8644;
   }
</style>


</head>

<body>
  <?php
  // Check if the room was successfully added
  if (isset($_SESSION['room_added']) && $_SESSION['room_added']) {


    echo '<script>
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 10000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Room added successfully"
            });
          </script>';
    // Unset the session variable to prevent displaying the toast on page refresh
    unset($_SESSION['room_added']);
  }
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index2.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Melzar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <?php include "notification.php"; ?>

        <li class="nav-item dropdown">





        </li><!-- End Messages Nav -->

        <?php include "user_profile_header.php"; ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index2.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending.php" >
              <i class="bi bi-circle"></i><span>Pending Lists</span>
            </a>
          </li>
          <li>
            <a href="approved.php">
              <i class="bi bi-circle"></i><span>Approved Lists</span>
            </a>
          </li>
          <li>
            <a href="occupied.php">
              <i class="bi bi-circle"></i><span>Occupied Lists</span>
            </a>
          </li>
          <li>
            <a href="done_booking.php">
              <i class="bi bi-circle"></i><span>Success Lists</span>
            </a>
          </li>
          <li>
            <a href="check_out_today.php">
              <i class="bi bi-circle"></i><span>Check Out Today</span>
            </a>
          </li>
          <li>
            <a href="cancelled.php">
              <i class="bi bi-circle"></i><span>Cancelled Lists</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="bedrooms.php">
          <i class="ri-hotel-bed-line"></i>
          <span>Bed Rooms</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="feedbacks.php">
        <i class="ri-feedback-line"></i>
          <span>Feedbacks</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link" href="users-profile.php">
          <i class='bx bxs-user-detail'></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed text-danger" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
          <li class="breadcrumb-item active">Admin's List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Reports -->
            <div class="col-12">
              <div class="card">

              </div>
            </div><!-- End Reports -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">

<br>
<button type="button" class="button" id="add_room">
  <span class="button__text">Add Admin</span>
  <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button><br>



                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                            <th scope="col">Profile</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Role</th>

                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="live_admin_table">
   <?php
   // Database connection
   include "conn.php";

   // Fetch data from rooms_tbl
   $current_user_id = $_SESSION['id'];
   $sql = "SELECT * FROM admin_acc WHERE id != ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $current_user_id);
   $stmt->execute();
   $result = $stmt->get_result();
   $i = 1;

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
   ?>
           <tr>
              <td class='fw-bold'><?php echo $i++; ?></td>

               <th scope='row'>
                 <a href='#' class='image-link' onclick='enlargeImages("<?php echo $row['id']; ?>", "room_img/<?php echo $row['image1']; ?>", "room_img/<?php echo $row['image2']; ?>", "room_img/<?php echo $row['image3']; ?>")'>
                    <img src='admin_profile/<?php echo $row['profile']; ?>' alt='' style="border-radius:40% !important;" width="50" height="50">
                </a>

               </th>

               <td><a href='#' class='text-primary fw-bold'><?php echo $row['user_name']; ?></a></td>
               <td class='fw-bold'><?php echo $row['role']; ?></td>

               <!-- Edit and delete buttons -->
               <td>
                <button class='btn btn-primary btn-sm edit-btn' room-id='<?php echo $row['id']; ?>'><i class="ri-edit-box-line"></i>Edit</button>

                   <button class='btn btn-danger btn-sm delete-btn' admin-id='<?php echo $row['id']; ?>'><i class="ri-delete-bin-line"></i>Delete</button>
               </td>
           </tr>
   <?php
       }
   } else {
   ?>
           <tr><td colspan='7'>0 results</td></tr>
   <?php
   }
   ?>
 </tbody>


                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;<strong><span>Melzar</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">Bsit Made</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {
  const addButton = document.getElementById('add_room');

  addButton.addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Admin',
      html:
        '<input id="user_name" class="swal2-input" placeholder="Username">' +
        '<input id="password" type="password" class="swal2-input" placeholder="Password">' +
        '<select id="role" class="swal2-select" placeholder="Select Role">' +
        '<option selected disabled>Choose Role</option>' +
        '<option value="Manager">Manager</option>' +
        '<option value="Restaurant - POS">Restaurant - POS</option>' +
        '<option value="Restaurant - Prep">Restaurant - Prep</option>' +
        '</select>',
      showCancelButton: true,
      confirmButtonText: 'Add Admin',
      cancelButtonText: 'Cancel',
      focusConfirm: false,
      preConfirm: () => {
        const user_name = document.getElementById('user_name').value;
        const password = document.getElementById('password').value;
        const role = document.getElementById('role').value;
        if (!user_name || !password || !role) {
          Swal.showValidationMessage('Please enter username, password, and select a role');
        }
        return { user_name: user_name, password: password, role: role };
      }
    }).then((result) => {
      if (result.isConfirmed) {
        const formData = {
          user_name: result.value.user_name,
          password: result.value.password,
          role: result.value.role
        };
        // Send form data to PHP script using AJAX
        fetch('insert_admin.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
          if (data.success) {
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Added Successfully"
            });
          } else {
            Swal.fire('Error', 'An error occurred while adding admin', 'error');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire('Error', 'An error occurred while adding admin', 'error');
        });
      }
    });
  });

  // Function to handle edit button click
  function handleEditButtonClick(event) {
    const target = event.target;
    if (target.classList.contains('edit-btn')) {
      const adminId = target.getAttribute('room-id');
      // Fetch the details of the selected admin using AJAX
      fetch('functions/get_admin_details.php?id=' + adminId)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Display a Swal2 modal with the admin details
            Swal.fire({
              title: 'Edit Admin',
              html:
                '<input id="edit_username" class="swal2-input" placeholder="Username" value="' + data.admin.username + '">' +

                '<select id="edit_role" class="swal2-select" placeholder="Select Role">' +
                '<option value="Manager" ' + (data.admin.role === 'Manager' ? 'selected' : '') + '>Manager</option>' +
                '<option value="Restaurant" ' + (data.admin.role === 'Restaurant' ? 'selected' : '') + '>Restaurant</option>' +
                '</select>',
              showCancelButton: true,
              confirmButtonText: 'Save',
              cancelButtonText: 'Cancel',
              focusConfirm: false
            }).then((result) => {
              if (result.isConfirmed) {
                // Get the updated values
                const updatedUsername = document.getElementById('edit_username').value;
                const updatedRole = document.getElementById('edit_role').value;

                // Send the updated data to the server using AJAX
                fetch('functions/update_admin.php', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({
                    id: adminId,
                    username: updatedUsername,
                    role: updatedRole
                  })
                })
                .then(response => response.json())
                .then(responseData => {
                  if (responseData.success) {
                    const Toast = Swal.mixin({
                      toast: true,
                      position: "top-end",
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                      }
                    });
                    Toast.fire({
                      icon: "success",
                      title: "Updated Successfully"
                    });
                  } else {
                    Swal.fire('Error', 'An error occurred while updating admin', 'error');
                  }
                })
                .catch(error => {
                  console.error('Error:', error);
                  Swal.fire('Error', 'An error occurred while updating admin', 'error');
                });
              }
            });
          } else {
            Swal.fire('Error', 'Failed to fetch admin details', 'error');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire('Error', 'An error occurred while fetching admin details', 'error');
        });
    }
  }

  // Function to handle delete button click
  function handleDeleteButtonClick(event) {
    const target = event.target;
    if (target.classList.contains('delete-btn')) {
      const adminId = target.getAttribute('admin-id');
      // Display a Swal2 confirmation modal
      Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // If user confirms deletion, send AJAX request to delete admin data
          fetch('delete_admin.php?id=' + adminId, {
            method: 'DELETE'
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // If deletion is successful, show success message and reload the page or update the table
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: "Deleted Successfully"
              });
              // Reload the page or update the table here
            } else {
              Swal.fire('Error', 'An error occurred while deleting admin', 'error');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'An error occurred while deleting admin', 'error');
          });
        }
      });
    }
  }

  // Attach event listeners using event delegation
  document.querySelector('tbody').addEventListener('click', handleEditButtonClick);
  document.querySelector('tbody').addEventListener('click', handleDeleteButtonClick);

  // Function to fetch and update table data
  function updateAdminTable() {
    // Perform an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "live_table/fetch_admin_data.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the table with the fetched data
          document.getElementById("live_admin_table").innerHTML = xhr.responseText;
        } else {
          console.error("Error fetching data: " + xhr.status);
        }
      }
    };
    xhr.send();
  }

  // Call the function initially and every 1.5 seconds
  updateAdminTable(); // Call initially
  setInterval(updateAdminTable, 1500); // Call every 1.5 seconds
});
 // Call every 1.5 seconds
</script>
  <script src="notification.js"></script>     
</body>

</html>
