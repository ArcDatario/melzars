$(document).on('click', '.edit-btn', function() {
    var roomId = $(this).data('room-id');

    $.ajax({
        url: 'fetch_room_details.php',
        method: 'GET',
        data: { id: roomId },
        dataType: 'json',
        success: function(response) {
            var modalContent = `
            <div class="modal-body">
            <form id="roomForm" action="add_room.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="roomName">Room Name</label>
                    <input type="text" class="form-control" id="roomName" name="roomName"value="${response.room_name}" required>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="price">Price</label>
                    ₱<input type="number" class="form-control" id="price" name="price" value="${response.price}" required>
                </div>
                  </div>
                </div>
               
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <select class="form-control" id="capacity" name="capacity" required>
                    <option value="">Select Capacity</option>
        <option value="2 Pax" ${response.capacity === '2 Pax' ? 'selected' : ''}>2 Pax</option>
        <option value="3 Pax" ${response.capacity === '3 Pax' ? 'selected' : ''}>3 Pax</option>
        <option value="4 Pax" ${response.capacity === '4 Pax' ? 'selected' : ''}>4 Pax</option>
        <option value="5 Pax" ${response.capacity === '5 Pax' ? 'selected' : ''}>5 Pax</option>
        <option value="6 Pax" ${response.capacity === '6 Pax' ? 'selected' : ''}>6 Pax</option>
        <option value="7 Pax" ${response.capacity === '7 Pax' ? 'selected' : ''}>7 Pax</option>
        <option value="8 Pax" ${response.capacity === '8 Pax' ? 'selected' : ''}>8 Pax</option>
        <option value="9 Pax" ${response.capacity === '9 Pax' ? 'selected' : ''}>9 Pax</option>
        <option value="10 Pax" ${response.capacity === '10 Pax' ? 'selected' : ''}>10 Pax</option>
        <option value="11 Pax" ${response.capacity === '11 Pax' ? 'selected' : ''}>11 Pax</option>
        <option value="12 Pax" ${response.capacity === '12 Pax' ? 'selected' : ''}>12 Pax</option>
                    </select>


                </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                    <label for="bedrooms">Bedrooms</label>
                    <select class="form-control" id="bedrooms" name="bedrooms" required>
                        <option value="">Select Bedrooms</option>
                        <option value="1 Bedroom" ${response.bed === '1 Bedroom' ? 'selected' : ''}>1 Bedroom</option>
                        <option value="2 Bedrooms" ${response.bed === '2 Bedrooms' ? 'selected' : ''}>2 Bedrooms</option>
                        <option value="3 Bedrooms" ${response.bed === '3 Bedrooms' ? 'selected' : ''}>3 Bedrooms</option>
                        <option value="4 Bedrooms" ${response.bed === '4 Bedrooms' ? 'selected' : ''}>4 Bedrooms</option>
                        <option value="5 Bedrooms" ${response.bed === '5 Bedrooms' ? 'selected' : ''}>5 Bedrooms</option>
                    </select>
                </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category">Room Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Classic Room" ${response.category === 'Classic Room' ? 'selected' : ''}>Classic Room</option>
                        <option value="Family Room" ${response.category === 'Family Room' ? 'selected' : ''}>Family Room</option>
                        <option value="Premium Room" ${response.category === 'Premium Room' ? 'selected' : ''}>Premium Room</option>
                        
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="services">Services</label>
                    <input type="text" class="form-control" id="services" name="services" value="${response.services}"required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"  required>${response.description}</textarea>
                </div>
                <br>               
        </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 140px;">
            <img src="${response.image1}" id="preview-image1" class="current-image" style="width: 100%; height: 120px;" alt="Image 1">
            <input type="hidden" id="old_image1" name="old_image1"class="swal2-file" value="${response.image1}">
            <input type="file" id="image1" name="image1"class="swal2-file" accept="image/*">
        </div>
        <div style="width: 140px;">
            
        <img src="${response.image2}" id="preview-image2" class="current-image" style="width: 100%; height: 120px;" alt="Image 2">
        <input type="hidden" id="old_image2" name="old_image2" class="swal2-file" value="${response.image2}">
        <input type="file" id="image2" name="image2" class="swal2-file" accept="image/*">
        </div>
        <div style="width: 140px;">
            <img src="${response.image3}" id="preview-image3" class="current-image" style="width: 100%; height: 120px;" alt="Image 3">
            <input type="hidden" id="old_image3" name="old_image3"class="swal2-file" value="${response.image3}">
            <input type="file" id="image3" name="image3" class="swal2-file" accept="image/*">
        </div>
    </div>`;

        

            Swal.fire({
                title: 'Edit Room Details',
                html: modalContent,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: function() {
                    var formData = new FormData();
                    formData.append('id', roomId);
                    formData.append('roomName', $('#roomName').val());
                    formData.append('price', $('#price').val());
                    formData.append('capacity', $('#capacity').val());
                    formData.append('bedrooms', $('#bedrooms').val());
                    formData.append('services', $('#services').val());
                    formData.append('category', $('#category').val());
                    formData.append('description', $('#description').val());
                    formData.append('old_image1', $('#old_image1').val());
                    formData.append('old_image2', $('#old_image2').val());
                    formData.append('old_image3', $('#old_image3').val());
                    formData.append('image1', $('#image1')[0].files[0]);
                    formData.append('image2', $('#image2')[0].files[0]);
                    formData.append('image3', $('#image3')[0].files[0]);
              
                   
                    return $.ajax({
                        url: 'update_room_details.php',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
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
                }
            });

            function displayImagePreview(input, previewId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#' + previewId).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#image1').change(function() {
                displayImagePreview(this, 'preview-image1');
            });
            $('#image2').change(function() {
                displayImagePreview(this, 'preview-image2');
            });
            $('#image3').change(function() {
                displayImagePreview(this, 'preview-image3');
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
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
