$(document).on('click', '.edit-btn', function() {
    var roomId = $(this).data('room-id');

    $.ajax({
        url: 'fetch_room_details.php',
        method: 'GET',
        data: { id: roomId },
        dataType: 'json',
        success: function(response) {
            var modalContent =
                '<input id="room_name" class="swal2-input" value="' + response.room_name + '" placeholder="Room Name">' +
                '<input id="price" class="swal2-input" value="' + response.price + '" placeholder="Price">' +
                '<input id="capacity" class="swal2-input" value="' + response.capacity + '" placeholder="Capacity">' +
                '<input id="bed" class="swal2-input" value="' + response.bed + '" placeholder="Bed">' +
                '<input id="services" class="swal2-input" value="' + response.services + '" placeholder="Services">' +
                '<input type="hidden" id="old_image1" value="' + response.image1 + '">' +
                '<input type="hidden" id="old_image2" value="' + response.image2 + '">' +
                '<input type="hidden" id="old_image3" value="' + response.image3 + '">' +
                '<div style="display: flex; justify-content: space-between;">' +
                    '<div style="width: 140px;">' +
                        '<img src="' + response.image1 + '" id="preview-image1" class="current-image" style="width: 100%; height: 120px;" alt="Image 1">' +
                        '<input type="file" id="image1" class="swal2-file" accept="image/*">' +
                    '</div>' +
                    '<div style="width: 140px;">' +
                        '<img src="' + response.image2 + '" id="preview-image2" class="current-image" style="width: 100%; height: 120px;" alt="Image 2">' +
                        '<input type="file" id="image2" class="swal2-file" accept="image/*">' +
                    '</div>' +
                    '<div style="width: 140px;">' +
                        '<img src="' + response.image3 + '" id="preview-image3" class="current-image" style="width: 100%; height: 120px;" alt="Image 3">' +
                        '<input type="file" id="image3" class="swal2-file" accept="image/*">' +
                    '</div>' +
                '</div>';

            Swal.fire({
                title: 'Edit Room Details',
                html: modalContent,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: function() {
                    var formData = new FormData();
                    formData.append('id', roomId);
                    formData.append('room_name', $('#room_name').val());
                    formData.append('price', $('#price').val());
                    formData.append('capacity', $('#capacity').val());
                    formData.append('bed', $('#bed').val());
                    formData.append('services', $('#services').val());
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
