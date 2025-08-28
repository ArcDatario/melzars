<?php include "admin_session.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/pos.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <box-icon name='fullscreen' style="margin-right:25px;" class="toggle-btn" id="toggle-btn" title="Fullscreen"></box-icon>

        <?php include "user_profile_header.php"; ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <li class="nav-item">
        <a class="nav-link  collapsed" href="pos.php">
        <i class="ri-tablet-line"></i>
          <span>POS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  collapsed" href="pending_orders.php">
          <i class='bx bxs-bowl-rice'></i>
          <span>Orders</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="menu.php">
          <i class='bx bx-food-menu'></i>
          <span>Menu</span>
        </a>
      </li>






      <li class="nav-heading">Account</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="restaurant_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed text-danger" href="logout.php">
          <i class="ri-logout-box-line"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">




            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">



                <div class="card-body pb-0">
                  <h5 class="card-title">Food Lists<span>  <button type="button" class="add_menu_btn" onclick="openForm()">

                        <span class="add_menu_span"> Add <i class='bx bx-bowl-rice'></i>

                        </span>
                    </button></span></h5>



                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">FoodName</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                          <th scope="col">Stocks</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="food_menu_table">
                      <?php
// Database connection
include "conn.php";

// Fetch data from foods_tbl
$sql = "SELECT * FROM foods_tbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <th scope="row"><a href="#"><img src="food_images/<?php echo $row['image']; ?>" alt="Food Image" height="75" width="125"></a></th>
            <td><a href="#" class="text-primary fw-bold"><?php echo $row['food_name']; ?></a></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stocks']; ?></td>

            <td>

            <button class="edit_btn" data-food-id="<?php echo $row['id']; ?>">Edit</button>

                <button class="delete_btn" id="delete_btn" data-food-id="<?php echo $row['id']; ?>">Delete</button>

            </td>
        </tr>
<?php
    }
} else {
?>
        <tr>
            <td colspan="4">No data found</td>
        </tr>
<?php
}

$conn->close();
?>


                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->


      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

      </script>


      <script>

      $(document).ready(function(){
        // Function to fetch recent occupied bookings and update the section
        function fetch_food_menu() {
            $.ajax({
                url: 'functions/get_food_data.php', // Path to your PHP script fetching recent occupied bookings
                type: 'GET',
                success: function(response) {
                    $('#food_menu_table').html(response);
                }
            });
        }
        // Fetch recent occupied bookings every 5 seconds
        setInterval(fetch_food_menu, 1100); // Change interval as needed
      });

      function openForm() {
    Swal.fire({
        title: 'Enter Food Details',
        html:
            '<input id="food-name" class="swal2-input" style="width: 84%; font-size: 18px;" placeholder="Food Name">' +
            '<input id="food-price" class="swal2-input" style="width: 84%; font-size: 18px;" placeholder="Price">' +
            '<input id="food-stock" type="number" class="swal2-input" style="width: 84%; font-size: 18px;" placeholder="Stock">' +
            '<select id="food-status" class="swal2-select" style="width: 84%; font-size: 18px;">' +
            '<option value="display">Display</option>' +
            '<option value="hide">Hide</option>' +
            '</select>' +
            '<select id="food-category" class="swal2-select" style="width: 84%; font-size: 18px;">' +
            ' <option disabled >Select Category</option>' +
            '<option value="Rice">Rice</option>' +
            '<option value="Dish">Dish</option>' +
            '<option value="Dessert">Desert</option>' +
            '<option value="Beverages">Beverages</option>' +
            '<option value="Bar&Drinks">Bar&Drinks</option>' +
            '</select>' +
            '<div id="photoPreviewContainer" style="margin-top: 5px; width:70%; margin-left:15%;"></div>' +
            '<input type="file" id="foodImage" class="swal2-input" name="photo" accept="image/*" style="width: 84%; font-size: 18px; color: #111111; border: none;" onchange="displaySelectedPhoto(this)" required>' +
            '<style>.swal2-file[type=file]::-webkit-file-upload-button { background-color: #488aec; color: #ffffff; }</style>',

        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Submit',
        preConfirm: () => {
            const foodName = Swal.getPopup().querySelector('#food-name').value;
            const price = Swal.getPopup().querySelector('#food-price').value;
            const stock = Swal.getPopup().querySelector('#food-stock').value;
            const status = Swal.getPopup().querySelector('#food-status').value;
            const category = Swal.getPopup().querySelector('#food-category').value;
            const foodImage = Swal.getPopup().querySelector('#foodImage').files[0];
            if (!foodName || !price || !stock || !status || !foodImage) {
                Swal.showValidationMessage('Please fill in all fields and select an image');
            }
            return { foodName: foodName, price: price, stock: stock, status: status,category: category, foodImage: foodImage };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData();
            formData.append('foodName', result.value.foodName);
            formData.append('price', result.value.price);
            formData.append('stock', result.value.stock);
            formData.append('status', result.value.status);
            formData.append('category', result.value.category);
            formData.append('foodImage', result.value.foodImage);

            // Send data via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'functions/insert_food.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    Swal.fire('Success', xhr.responseText, 'success');
                } else {
                    Swal.fire('Error', 'An error occurred while inserting data', 'error');
                }
            };
            xhr.send(formData);
        }
    });
}

      function displaySelectedPhoto(input) {
        const photoPreviewContainer = document.getElementById('photoPreviewContainer');
        const photoPreview = document.createElement('img');
        photoPreview.id = 'editPhotoPreview';
        photoPreview.style.width = '200px';
        photoPreview.style.height = '200px';



        const file = input.files[0];

        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            photoPreview.src = e.target.result;
          };
          reader.readAsDataURL(file);

          // Clear previous content
          while (photoPreviewContainer.firstChild) {
            photoPreviewContainer.removeChild(photoPreviewContainer.firstChild);
          }

          // Append the preview image
          photoPreviewContainer.appendChild(photoPreview);
        }
      }



      // Event delegation for edit buttons
  $(document).on('click', '.edit_btn', function() {
      // Get the data-food-id attribute value
      const foodId = $(this).attr('data-food-id');

      // Make an AJAX call to fetch the details of the selected food item
      fetch('functions/get_food_details.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'food_id=' + foodId
      })
      .then(response => response.json())
      .then(foodDetails => {
          // Display SweetAlert2 modal with the fetched data
          Swal.fire({
              title: 'Edit Food',
              html: `
                  <input id="food-id" type="hidden" value="${foodId}">
                  <input id="food-name" class="swal2-input" style="width: 84%; font-size: 18px;" value="${foodDetails.food_name}">
                  <input id="food-price" class="swal2-input" style="width: 84%; font-size: 18px;" value="${foodDetails.price}">
                  <select id="food-status" class="swal2-select" style="width: 84%; font-size: 18px;">
                      <option value="display" ${foodDetails.status === 'display' ? 'selected' : ''}>Display</option>
                      <option value="hide" ${foodDetails.status === 'hide' ? 'selected' : ''}>Hide</option>
                  </select>
                  <div id="photoPreviewContainer" style="margin-top: 5px; width:70%; margin-left:15%;">
                      <img src="food_images/${foodDetails.image}" alt="Food Image" id="food-image-preview" style="max-width: 100%;">
                  </div>
                  <input type="file" id="foodImage" class="swal2-input" name="photo" accept="image/*" style="width: 84%; font-size: 18px; color: #111111; border: none;" onchange="displaySelectedPhoto(this)">
                  <style>.swal2-file[type=file]::-webkit-file-upload-button { background-color: #488aec; color: #ffffff; }</style>
              `,
              showCancelButton: true,
              confirmButtonText: 'Save',
              cancelButtonText: 'Cancel',
              focusConfirm: false,
              preConfirm: () => {
                  // Handle saving the edited data
                  const foodId = document.getElementById('food-id').value;
                  const editedName = document.getElementById('food-name').value;
                  const editedPrice = document.getElementById('food-price').value;
                  const editedStatus = document.getElementById('food-status').value;
                  const editedImage = document.getElementById('foodImage').files[0];

                  // Create FormData object to send data with file
                  const formData = new FormData();
                  formData.append('food_id', foodId);
                  formData.append('food_name', editedName);
                  formData.append('price', editedPrice);
                  formData.append('status', editedStatus);
                  if (editedImage) {
                      formData.append('image', editedImage);
                  }

                  // Make an AJAX call to update the food data
                  return fetch('functions/update_food.php', {
                      method: 'POST',
                      body: formData
                  })
                  .then(response => response.json())
                  .then(data => {
                      // Handle response from update_food.php
                      if (data.success) {
                          // Show success message
                          Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: 'Food updated successfully!'
                          });
                          // You may also update the UI to reflect the changes
                      } else {
                          // Show error message
                          Swal.fire({
                              icon: 'error',
                              title: 'Error',
                              text: data.message || 'Failed to update food!'
                          });
                      }
                  })
                  .catch(error => {
                      console.error('Error:', error);
                      // Show error message
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Failed to update food!'
                      });
                  });
              }
          });
      })
      .catch(error => {
          console.error('Error:', error);
          // Handle error, for example display an error message
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Failed to fetch food details!'
          });
      });
  });



  // Event delegation for delete buttons
$(document).on('click', '.delete_btn', function() {
  // Get the data-food-id attribute value
  const foodId = $(this).attr('data-food-id');

  // Display SweetAlert2 confirmation modal
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
          // If user confirms deletion, make AJAX call to delete the food item
          deleteFoodItem(foodId);
      }
  });
});

// Function to delete the food item
function deleteFoodItem(foodId) {
  // Make an AJAX call to delete the food item
  fetch('functions/delete_food.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'food_id=' + foodId
  })
  .then(response => response.json())
  .then(data => {
      // Handle response from delete_food.php
      if (data.success) {
          // Show success message
          Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Food deleted successfully!'
          });
          // You may also update the UI to reflect the changes, e.g., by refreshing the food menu
          fetch_food_menu(); // Assuming fetch_food_menu is defined elsewhere to update the food menu
      } else {
          // Show error message only if deletion was not successful
          Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Food deleted successfully!'
          });
      }
  })
  .catch(error => {
      console.error('Error:', error);
      // Show error message
      Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Food deleted successfully!'
      });
  });
}



      </script>

<script>
const toggleBtn = document.getElementById('toggle-btn');

// Function to toggle fullscreen mode
const toggleFullscreen = () => {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
    sessionStorage.setItem('fullscreen', 'true'); // Store fullscreen state in session storage
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
      sessionStorage.removeItem('fullscreen'); // Remove fullscreen state from session storage
    }
  }
};

// Event listener for toggle button click
toggleBtn.addEventListener('click', () => {
  toggleFullscreen();
});

// Function to check and apply fullscreen state on page load
const checkFullscreen = () => {
  const isFullscreen = sessionStorage.getItem('fullscreen') === 'true';
  if (isFullscreen && !document.fullscreenElement) {
    toggleFullscreen(); // Apply fullscreen if stored state is true and fullscreen is not active
  }
};

// Call checkFullscreen on page load
document.addEventListener('DOMContentLoaded', checkFullscreen);


</script>
</body>

</html>
