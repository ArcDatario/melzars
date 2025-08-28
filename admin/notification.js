function fetchNotifications() {
  $.ajax({
    url: 'fetch_notifications.php',
    type: 'GET',
    dataType: 'html',
    success: function(response) {
      $('#notification-list').html(response);
    },
    error: function(xhr, status, error) {
      console.error('Error fetching notifications:', error);
    }
  });
}

// Initial fetch
fetchNotifications();

// Fetch notifications every 3 seconds
setInterval(fetchNotifications, 3000);



$(document).ready(function() {
    // Function to fetch pending bookings count from the server
    function fetchPendingBookingsCount() {
        $.ajax({
            url: 'functions/fetch_pending_bookings_count.php', // URL of your PHP script
            type: 'GET',
            success: function(response) {
                // Update the badge number with the pending count
                $('#pendingBookingsCount').text(response);

                $('#new_notif').text("You have " + response + " Pending Bookings");
            },
            error: function(xhr, status, error) {
                console.error('Error fetching pending bookings count: ' + error);
            }
        });
    }

    // Fetch pending bookings count initially when the page loads
    fetchPendingBookingsCount();

    // Fetch pending bookings count at regular intervals to keep it real-time
    setInterval(fetchPendingBookingsCount, 2000); // Update every 5 seconds (adjust as needed)
});
