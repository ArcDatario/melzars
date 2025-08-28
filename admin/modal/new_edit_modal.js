// Function to handle click event on edit button
$('.edit-btn').click(function() {
    // Get the room ID from the data attribute
    var roomId = $(this).attr('room-id');

    // Make an AJAX request to fetch the room details
    $.ajax({
        url: '../admin/functions/get_room_details.php',
        type: 'POST',
        data: {roomId: roomId},
        success: function(response) {
            // Parse the JSON response
            var room = JSON.parse(response);

            // Display SweetAlert2 modal with the populated form
            Swal.fire({
                title: 'Edit Room',
                html: `<form id="editForm" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="roomName" class="modal_label">Room</label>
                              <input type="text" id="roomName" class="swal2-input" name="roomName" value="${room.room_name}">
                              <input type="hidden" id="roomId" class="swal2-input" name="roomId" value="${roomId}">
                            </div>
                            <div class="form-group">
                              <label for="price" class="modal_label">Price</label>
                              <input type="number" id="price" class="swal2-input" name="price" value="${room.price}">
                            </div>
                            <div class="form-group">
                              <label for="capacity" class="modal_label">Capacity</label>
                              <select id="capacity" class="swal2-input" name="capacity" style="border:1px solid #D0D2D6; border-radius:6px;">
                                <option value="2 Pax" ${room.capacity === '2 Pax' ? 'selected' : ''}>2 Pax</option>
                                <option value="3 Pax" ${room.capacity === '3 Pax' ? 'selected' : ''}>3 Pax</option>
                                <option value="4 Pax" ${room.capacity === '4 Pax' ? 'selected' : ''}>4 Pax</option>
                                <option value="5 Pax" ${room.capacity === '5 Pax' ? 'selected' : ''}>5 Pax</option>
                                <option value="6 Pax" ${room.capacity === '6 Pax' ? 'selected' : ''}>6 Pax</option>
                                <option value="7 Pax" ${room.capacity === '7 Pax' ? 'selected' : ''}>7 Pax</option>
                                <option value="8 Pax" ${room.capacity === '8 Pax' ? 'selected' : ''}>8 Pax</option>
                                <option value="9 Pax" ${room.capacity === '9 Pax' ? 'selected' : ''}>9 Pax</option>
                                <option value="10 Pax" ${room.capacity === '10 Pax' ? 'selected' : ''}>10 Pax</option>
                                <option value="11 Pax" ${room.capacity === '11 Pax' ? 'selected' : ''}>11 Pax</option>
                                <option value="12 Pax" ${room.capacity === '12 Pax' ? 'selected' : ''}>12 Pax</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="bedrooms" class="modal_label">Bedrooms</label>
                              <select id="bedrooms" class="swal2-input" name="bedrooms" style="border:1px solid #D0D2D6; border-radius:6px;">
                                <option value="1 Bedroom" ${room.bedrooms === '1 Bedroom' ? 'selected' : ''}>1 Bedroom</option>
                                <option value="2 Bedrooms" ${room.bedrooms === '2 Bedrooms' ? 'selected' : ''}>2 Bedrooms</option>
                                <option value="3 Bedrooms" ${room.bedrooms === '3 Bedrooms' ? 'selected' : ''}>3 Bedrooms</option>
                                <option value="4 Bedrooms" ${room.bedrooms === '4 Bedrooms' ? 'selected' : ''}>4 Bedrooms</option>
                                <option value="5 Bedrooms" ${room.bedrooms === '5 Bedrooms' ? 'selected' : ''}>5 Bedrooms</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="services" class="modal_label">Services</label>
                              <input type="text" id="services" class="swal2-input" name="services" value="${room.services}">
                            </div>
                            <div class="form-group">
                              <label for="description" class="modal_label">Description</label>
                              <input type="text" id="description" class="swal2-input" name="description" value="${room.description}">
                            </div>
                            <div class="form-group images-row">
                              <div>
                                <label for="image1">Image 1</label>
                                <img src="${room.image1}" alt="Image 1" id="displayImage1">
                                <input type="hidden" value="${room.image1}" alt="Image 3"  name="old_image1">
                                <input type="file" id="image1" name="new_image1_file_input" class="swal2-input image_input" onchange="displayNewImage(this, 'displayImage1')">
                              </div>
                              <div>
                                <label for="image2">Image 2</label>
                                <img src="${room.image2}" alt="Image 2" id="displayImage2">
                                <input type="hidden" value="${room.image2}" alt="Image 3"  name="old_image2">
                                <input type="file" id="image2" name="new_image2_file_input" class="swal2-input image_input" onchange="displayNewImage(this, 'displayImage2')">
                              </div>
                              <div>
                                <label for="image3">Image 3</label>
                                <img src="${room.image3}" alt="Image 3" id="displayImage3">
                                <input type="hidden" value="${room.image3}" alt="Image 3"  name="old_image3">
                                <input type="file" id="image3" name="new_image3_file_input" class="swal2-input image1_input" onchange="displayNewImage(this, 'displayImage3')">
                              </div>
                            </div>
                            <!-- Add other form inputs here -->
                          </form>`,
                showCancelButton: true,
                confirmButtonText: 'Save Changes'
            }).then((result) => {
                // Handle form submission if user confirms
                if (result.isConfirmed) {
                    // Submit form using AJAX
                    $.ajax({
                        url: '../admin/functions/update_room.php',
                        type: 'POST',
                        data: $('#editForm').serialize(), // Serialize form data
                        success: function(response) {
                            // Parse JSON response
                            var data = JSON.parse(response);
                            if (data.success) {
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
                                    title: 'Error updating room',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        }
    });
});

// Function to display new image
function displayNewImage(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + imgId).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
