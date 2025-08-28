$(document).ready(function() {
    $('#add_room').click(function() {
        Swal.fire({
            title: 'Add New Room',
            html: ` <div class="modal-body">
            <form id="roomForm" action="add_room.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="roomName">Room Name</label>
                    <input type="text" class="form-control" id="roomName" name="roomName" required>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="price">Price</label>
                    ₱<input type="number" class="form-control" id="price" name="price" required>
                </div>
                  </div>
                </div>
               
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <select class="form-control" id="capacity" name="capacity" required>
                        <option value="">Select Capacity</option>
                        <option value="2 Pax">2 Pax</option>
                        <option value="3 Pax">3 Pax</option>
                        <option value="4 Pax">4 Pax</option>
                        <option value="5 Pax">5 Pax</option>
                        <option value="6 Pax">6 Pax</option>
                        <option value="7 Pax">7 Pax</option>
                        <option value="8 Pax">8 Pax</option>
                        <option value="9 Pax">9 Pax</option>
                        <option value="10 Pax">10 Pax</option>
                        <option value="11 Pax">11 Pax</option>
                        <option value="12 Pax">12 Pax</option>
                    </select>


                </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                    <label for="bedrooms">Bedrooms</label>
                    <select class="form-control" id="bedrooms" name="bedrooms" required>
                        <option value="">Select Bedrooms</option>
                        <option value="1 Bedroom">1 Bedroom</option>
                        <option value="2 Bedrooms">2 Bedrooms</option>
                        <option value="3 Bedrooms">3 Bedrooms</option>
                        <option value="4 Bedrooms">4 Bedrooms</option>
                        <option value="5 Bedrooms">5 Bedrooms</option>
                    </select>
                </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category">Room Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Classic Room">Classic Room</option>
                        <option value="Family Room">Family Room</option>
                        <option value="Premium Room">Premium Room</option>
                        
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="services">Services</label>
                    <input type="text" class="form-control" id="services" name="services" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <br>
                <div class="form-group mb-1">
                    <label for="image1">Image 1</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image1" name="image1" accept="image/*" required>
                    </div>
                </div>
                <div class="form-group  mb-1">
                    <label for="image2">Image 2</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image2" name="image2" accept="image/*" required>
                    </div>
                </div>
                <div class="form-group  mb-1">
                    <label for="image3">Image 3</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image3" name="image3" accept="image/*" required>
                    </div>
                </div>
        </div>`,
     
            showCancelButton: true,
            confirmButtonText: 'Save',
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#d33',
            focusConfirm: false,
            preConfirm: function() {
                var formData = new FormData();
formData.append('roomName', $('#roomName').val());
formData.append('price', $('#price').val());
formData.append('capacity', $('#capacity').val());
formData.append('bedrooms', $('#bedrooms').val());
formData.append('category', $('#category').val());
formData.append('services', $('#services').val());
formData.append('description', $('#description').val());
formData.append('image1', $('#image1')[0].files[0]);
formData.append('image2', $('#image2')[0].files[0]);
formData.append('image3', $('#image3')[0].files[0]);

                $.ajax({
                    url: 'insert_room.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
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
                            title: "Inserted Successfully!"
                          });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Failed to add room. Please try again later.', 'error');
                    }
                });
            }
        });
    });
});





   function updateTable() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("roomTableBody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "rooms_table.php", true); // Change "fetch_rooms.php" to the appropriate file name
        xhttp.send();
    }

    // Initial table update
    updateTable();

    // Periodically update table content every 0.5 seconds
    setInterval(updateTable, 1000);
