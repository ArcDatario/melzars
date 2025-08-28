$(document).ready(function() {
var roomId = getParameterByName('id'); // Get the room ID from the URL parameter
var userId = $('#user_id').val(); // Get the user ID from the hidden input field

// Send AJAX request to check the booking status
$.ajax({
    url: 'check_booking_status.php',
    type: 'POST',
    data: { roomId: roomId, userId: userId },
    dataType: 'json', // Specify that we expect JSON data in response
    success: function(response) {
        if (response.status === 'done') {
            $('.review-add').show(); // Show the feedback form
        } else {
            $('.review-add').hide(); // Hide the feedback form
        }
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
        // Handle error, such as showing an error message
    }
});
});

// Function to extract URL parameter by name
function getParameterByName(name, url) {
if (!url) url = window.location.href;
name = name.replace(/[\[\]]/g, '\\$&');
var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
    results = regex.exec(url);
if (!results) return null;
if (!results[2]) return '';
return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
