// Function to open SweetAlert2 modal with form and images
  function openEditModal(roomId, roomName, price, capacity, bedrooms, services, description, image1, image2, image3) {
    Swal.fire({
      title: 'Edit Room',
      html:
        `<form id="editForm" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="roomName" class="modal_label">Room</label>
    <input type="text" id="roomName" class="swal2-input" name="roomName" value="${roomName}">
    <input type="hidden" id="roomID" class="swal2-input" name="roomID" value="${roomId}">

  </div>

  <div class="form-group">
    <label for="price" class="modal_label">Price</label>
    <input type="number" id="price" class="swal2-input" name="price" value="${price}">
  </div>

  <div class="form-group">
          <label for="capacity" class="modal_label">Capacity</label>
          <select id="capacity" class="swal2-input" name="capacity" style="border:1px solid #D0D2D6; border-radius:6px;">

            <option value="2 Pax" ${capacity === '2 Pax' ? 'selected' : ''}>2 Pax</option>
            <option value="3 Pax" ${capacity === '3 Pax' ? 'selected' : ''}>3 Pax</option>
            <option value="4 Pax" ${capacity === '4 Pax' ? 'selected' : ''}>4 Pax</option>
            <option value="5 Pax" ${capacity === '5 Pax' ? 'selected' : ''}>5 Pax</option>
            <option value="6 Pax" ${capacity === '6 Pax' ? 'selected' : ''}>6 Pax</option>
            <option value="7 Pax" ${capacity === '7 Pax' ? 'selected' : ''}>7 Pax</option>
            <option value="8 Pax" ${capacity === '8 Pax' ? 'selected' : ''}>8 Pax</option>
            <option value="9 Pax" ${capacity === '9 Pax' ? 'selected' : ''}>9 Pax</option>
            <option value="10 Pax" ${capacity === '10 Pax' ? 'selected' : ''}>10 Pax</option>
            <option value="11 Pax" ${capacity === '11 Pax' ? 'selected' : ''}>11 Pax</option>
            <option value="12 Pax" ${capacity === '12 Pax' ? 'selected' : ''}>12 Pax</option>
          </select>
        </div>

        <div class="form-group">
                <label for="bedrooms" class="modal_label">Bedrooms</label>
                <select id="bedrooms" class="swal2-input" name="bedrooms" style="border:1px solid #D0D2D6; border-radius:6px;">
                  <option value="1 Bedroom" ${bedrooms === '1 Bedroom' ? 'selected' : ''}>1 Bedroom</option>
                  <option value="2 Bedrooms" ${bedrooms === '2 Bedrooms' ? 'selected' : ''}>2 Bedrooms</option>
                  <option value="3 Bedrooms" ${bedrooms === '3 Bedrooms' ? 'selected' : ''}>3 Bedrooms</option>
                  <option value="4 Bedrooms" ${bedrooms === '4 Bedrooms' ? 'selected' : ''}>4 Bedrooms</option>
                  <option value="5 Bedrooms" ${bedrooms === '5 Bedrooms' ? 'selected' : ''}>5 Bedrooms</option>
                </select>
              </div>

  <div class="form-group">
    <label for="services" class="modal_label">Services</label>
    <input type="text" id="services" class="swal2-input"name="services" value="${services}">
  </div>

  <div class="form-group">
    <label for="description" class="modal_label">Description</label>
    <input type="text" id="description" class="swal2-input" name="description" value="${description}">
  </div>

  <div class="form-group images-row">
         <div>
         <label for="image1">Image 1</label>
          <img src="${image1}" alt="Image 1" id="displayImage1">
          <input type="file" id="image1" name="image1_file_input" class="swal2-input image_input" onchange="displayNewImage(this, 'displayImage1')">

         </div>

         <div>
         <label for="image2">Image 2</label>
          <img src="${image2}" alt="Image 2" id="displayImage2">
          <input type="file" id="image2" name="image2_file_input" class="swal2-input image_input" onchange="displayNewImage(this, 'displayImage2')">

         </div>

         <div>
         <label for="image3">Image 3</label>
        <img src="${image3}" alt="Image 3" id="displayImage3">
        <input type="file" id="image3" name="image3_file_input" class="swal2-input image1_input" onchange="displayNewImage(this, 'displayImage3')">

      </div>

         </div>
       </div>
</form>
`,
      showCancelButton: true,
      confirmButtonText: 'Save Changes',
      preConfirm: () => {
        // Handle saving changes here, e.g., using an AJAX request
        const formData = new FormData();
formData.append('roomId', roomId);
formData.append('roomName', document.getElementById('roomName').value);
formData.append('price', document.getElementById('price').value);
formData.append('capacity', document.getElementById('capacity').value);
formData.append('bedrooms', document.getElementById('bedrooms').value);
formData.append('services', document.getElementById('services').value);
formData.append('description', document.getElementById('description').value);
formData.append('image1', document.getElementById('image1').files[0]);
formData.append('image2', document.getElementById('image2').files[0]);
formData.append('image3', document.getElementById('image3').files[0]);



        $.ajax({
       type: 'POST',
       url: 'update_room.php',
       data: formData,
       contentType: false,
       processData: false,
       success: function(response) {
         if (response.status === 'success') {
           // Show success toast
           Swal.fire({
             icon: 'success',
             title: 'Success!',
             text: 'Room details updated successfully.',
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true
           });
         } else {
           // Show error toast
           Swal.fire({
             icon: 'error',
             title: 'Error!',
             text: 'Failed to update room details. Please try again later.',
             showConfirmButton: false,
             timer: 2000
           });
         }
       },
       error: function(xhr, status, error) {
         console.error(xhr.responseText);
       }
     });

      }
    });

  }

  function displayNewImage(input, imageId) {
  const fileInput = input;
  const displayImage = document.getElementById(imageId);

  const reader = new FileReader();
  reader.onload = function (e) {
    displayImage.src = e.target.result;
  };

  const file = fileInput.files[0];
  if (file) {
    reader.readAsDataURL(file);
  }
}
  // Attach click event listener to the edit button
  document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const roomId = button.getAttribute('data-room-id');
        const roomName = button.getAttribute('room_name');
        const price = button.getAttribute('price');
        const capacity = button.getAttribute('capcity');
        const bedrooms = button.getAttribute('bedrooms');
        const services = button.getAttribute('services');
        const description = button.getAttribute('description');
        const image1 = button.getAttribute('image1');
        const image2 = button.getAttribute('image2');
        const image3 = button.getAttribute('image3');

        openEditModal(roomId, roomName, price, capacity, bedrooms, services, description, image1, image2, image3);
      });
    });
  });












$(document).on('click', '.delete-btn', function() {
    var roomId = $(this).data('room-id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this room and its images!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the delete operation
            $.ajax({
                url: 'delete_room.php',
                method: 'POST',
                data: { id: roomId },
                dataType: 'json', // Specify JSON dataType for parsing response
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success toast
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Room details updated successfully.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    } else {
                        // Show error toast
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to delete the room. Please try again later.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
