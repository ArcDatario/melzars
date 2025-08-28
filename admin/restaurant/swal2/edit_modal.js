// Add event listener for edit buttons
document.querySelectorAll('.edit_btn').forEach(button => {
    button.addEventListener('click', function() {
        // Get the data-food-id attribute value
        const foodId = this.getAttribute('data-food-id');

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
});
