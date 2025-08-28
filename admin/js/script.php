<script src="image_enlarge.js">
</script>
<script>
function confirmCancellation(bookingId, roomId) {
  // Display SweetAlert2 confirmation modal
  Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to cancel this booking.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, cancel it!'
  }).then((result) => {
      if (result.isConfirmed) {
          // If user confirms, trigger cancellation process
          cancelBooking(bookingId, roomId);
      }
  });
}

// Function to cancel booking via AJAX
function cancelBooking(bookingId, roomId) {
  $.ajax({
      url: 'cancel_booking.php',
      type: 'POST',
      data: {
          booking_id: bookingId,
          room_id: roomId
      },
      success: function(response) {
          if (response == "success") {
              // If cancellation is successful, show success message
              Swal.fire(
                  'Cancelled!',
                  'The booking has been cancelled.',
                  'success'
              ).then(() => {
                  // Reload the page or update UI as needed
                  location.reload();
              });
          } else {
              // If there's an error, show error message
              Swal.fire(
                  'Error!',
                  'Failed to cancel the booking. Please try again.',
                  'error'
              );
          }
      },
      error: function(xhr, status, error) {
          // If there's an error, show error message
          Swal.fire(
              'Error!',
              'Failed to cancel the booking. Please try again.',
              'error'
          );
      }
  });
}


function confirmApproval(bookingId) {
  // Display SweetAlert2 confirmation modal
  Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to approve this booking.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, approve it!'
  }).then((result) => {
      if (result.isConfirmed) {
          // If user confirms, trigger approval process
          approveBooking(bookingId);
      }
  });
}

// Function to approve booking via AJAX
function approveBooking(bookingId) {
  $.ajax({
      url: 'approve_booking.php',
      type: 'POST',
      data: {
          booking_id: bookingId
      },
      success: function(response) {
          if (response == "success") {
              // If approval is successful, show success message
              const Toast = Swal.mixin({
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 6000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                      toast.onmouseenter = Swal.stopTimer;
                      toast.onmouseleave = Swal.resumeTimer;
                  }
              });
              Toast.fire({
                  icon: "success",
                  title: "Book #" + bookingId + " has been approved."
              });
          } else {
              // If there's an error, show error message
              Swal.fire(
                  'Error!',
                  'Failed to approve the booking. Please try again.',
                  'error'
              );
          }
      },
      error: function(xhr, status, error) {
          // If there's an error, show error message
          Swal.fire(
              'Error!',
              'Failed to approve the booking. Please try again.',
              'error'
          );
      }
  });
}
</script>
<script>
function enlargeReceipt(receiptUrl, bookingId, roomId) {
  // Create a Swal2 modal with image
  Swal.fire({
      imageUrl: '../gcash/' + receiptUrl,
      imageAlt: 'Receipt Image',
      imageWidth: 450, // Fixed width for the image
      imageHeight: 525, // Fixed height for the image

      html: '<p>Booking ID: #' + bookingId + '</p>',
      showCloseButton: true,
      showCancelButton: true,
      showConfirmButton: true,
      confirmButtonText: 'Approved',
      cancelButtonText: 'Cancelled',
      confirmButtonColor: '#28a745', // Success color for approve button
      cancelButtonColor: '#dc3545',  // Danger color for cancel button

      showClass: {
          popup: `
            animate__animated
            animate__fadeInUp
            animate__fast
          `
      },
      hideClass: {
          popup: `
            animate__animated
            animate__fadeOutDown
            animate__fast
          `
      }
  }).then((result) => {
      if (result.isConfirmed) {
          // Send AJAX request to approve the booking
          $.ajax({
              type: 'POST',
              url: 'approve_booking.php',
              data: { booking_id: bookingId },
              success: function(response) {
                  // Check the response from the server
                  if (response === 'success') {
                      // If the booking is successfully approved, show success message
                      const Toast = Swal.mixin({
                          toast: true,
                          position: "top-end",
                          showConfirmButton: false,
                          timer: 6000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                              toast.onmouseenter = Swal.stopTimer;
                              toast.onmouseleave = Swal.resumeTimer;
                          }
                      });
                      Toast.fire({
                          icon: "success",
                          title: "Book #" + bookingId + " has been approved."
                      });
                      // Refresh the page after 5 seconds

                  } else {
                      // If there's an error, show error message
                      Swal.fire('Error', 'Failed to approve the booking.', 'error');
                  }
              },
              error: function() {
                  // If there's an error with the AJAX request, show error message
                  Swal.fire('Error', 'Failed to communicate with the server.', 'error');
              }
          });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
          // Send AJAX request to cancel the booking
          $.ajax({
              type: 'POST',
              url: 'cancel_booking.php',
              data: { booking_id: bookingId, room_id: roomId },
              success: function(response) {
                  // Check the response from the server
                  if (response === 'success') {
                      // If the booking is successfully cancelled, show success message
                      const Toast = Swal.mixin({
                          toast: true,
                          position: "top-end",
                          showConfirmButton: false,
                          timer: 6000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                              toast.onmouseenter = Swal.stopTimer;
                              toast.onmouseleave = Swal.resumeTimer;
                          }
                      });
                      Toast.fire({
                          icon: "info",
                          title: "Booking #" + bookingId + " has been cancelled."
                      });
                      // Refresh the page after 5 seconds

                  } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "info",
                        title: "Booking #" + bookingId + " has been cancelled."
                    });
                  }
              },
              error: function() {
                  // If there's an error with the AJAX request, show error message
                  Swal.fire('Error', 'Failed to communicate with the server.', 'error');
              }
          });
      }
  });
}

</script>
<script>
$(document).ready(function(){
// Function to fetch data and update the table
function fetchData() {
    $.ajax({
        url: 'live_table/fetch_pending_bookings.php', // Path to your PHP script fetching data
        type: 'GET',
        success: function(response) {
            $('#pending_table').html(response);
        }
    });
}

// Fetch data every second
setInterval(fetchData, 1000);
});
</script>
