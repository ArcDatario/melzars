// Add event listener for delete buttons
document.querySelectorAll('.delete_btn').forEach(button => {
    button.addEventListener('click', function() {
        // Get the data-food-id attribute value
        const foodId = this.getAttribute('data-food-id');

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
            // You may also update the UI to reflect the changes
        } else {
            // Show error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to delete food!'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Show error message
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Failed to delete food!'
        });
    });
}
