<script>
$(document).ready(function(){
    // Function to fetch revenue data from the server
    function fetchRevenueData() {
        $.ajax({
            url: 'fetch_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the revenue display
                animateRevenue(data.total_revenue_today);
                // Update the percentage change
                $('#percentage_change').text(data.percentage_change);
                // Update the change text
                $('#change_text').text(data.change_text);
                // Apply the appropriate class for percentage change
                $('#percentage_change').removeClass('text-danger text-success').addClass(data.class);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching revenue data: ' + error);
            }
        });
    }

    // Function to animate the revenue display
    function animateRevenue(newRevenue) {
        var currentRevenue = parseInt($('#sales_today').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#sales_today').text('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#sales_today').text('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch revenue data initially when the page loads
    fetchRevenueData();

    // Set interval to fetch revenue data periodically (every 5 seconds)
    setInterval(fetchRevenueData, 5000);
});





</script>

<script>
$(document).ready(function(){
  // Function to fetch monthly revenue data from the server
  function fetchMonthlyRevenueData() {
      $.ajax({
          url: 'functions/fetch_monthly_revenue.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateMonthlyRevenue(data.total_revenue_current_month);
              $('#percentage_month').text(data.percentage_change);
              $('#text_change_month').text(data.change_text);
              $('#percentage_month').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching monthly revenue data: ' + error);
          }
      });
  }

  // Function to animate the monthly revenue display
  function animateMonthlyRevenue(newRevenue) {
      var currentRevenue = parseInt($('#sales_month').text().replace(/[^\d]/g, ''));
      var difference = newRevenue - currentRevenue;
      var animationDuration = 1000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentRevenue;

      var timer = setInterval(function() {
          current += increment;
          $('#sales_month').text('₱' + numberWithCommas(Math.round(current)));
          if (current >= newRevenue) {
              clearInterval(timer);
              $('#sales_month').text('₱' + numberWithCommas(newRevenue));
          }
      }, animationDuration / frames);
  }

  // Function to add commas to a number
  function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Fetch monthly revenue data initially when the page loads
  fetchMonthlyRevenueData();

  // Set interval to fetch monthly revenue data periodically (every 5 seconds)
  setInterval(fetchMonthlyRevenueData, 2000);
});

</script>


<script>
$(document).ready(function(){
    // Function to fetch yearly revenue data from the server
    function fetchYearlyRevenueData() {
        $.ajax({
            url: 'functions/fetch_yearly_revenue.php', // URL of your PHP script
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);
                animateYearlyRevenue(data.total_revenue_current_year);
                $('#percentage_year').text(data.percentage_change);
                $('#text_change_year').text(data.change_text);
                $('#percentage_year').removeClass('text-danger text-success').addClass(data.class);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching yearly revenue data: ' + error);
            }
        });
    }

    // Function to animate the yearly revenue display
    function animateYearlyRevenue(newRevenue) {
        var currentRevenue = parseInt($('#sales_year').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#sales_year').text('₱' + numberWithCommas(Math.round(current)));
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#sales_year').text('₱' + numberWithCommas(newRevenue));
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch yearly revenue data initially when the page loads
    fetchYearlyRevenueData();

    // Set interval to fetch yearly revenue data periodically (every 5 seconds)
    setInterval(fetchYearlyRevenueData, 2000);
});

</script>


<script>
$(document).ready(function(){
  // Function to fetch overall sales data from the server
  function fetchOverallSalesData() {
      $.ajax({
          url: 'fucntions/fetch_overall_sales.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              $('#overall_sales').text(response);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching overall sales data: ' + error);
          }
      });
  }

  // Fetch overall sales data initially when the page loads
  fetchOverallSalesData();

  // Set interval to fetch overall sales data periodically (every 5 seconds)
  setInterval(fetchOverallSalesData, 5000);
});

</script>


<script>
$(document).ready(function(){
  // Function to fetch booking revenue data from the server
  function fetchBookingRevenueData() {
      $.ajax({
          url: 'functions/fetch_booking_revenue.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateBookingRevenue(data.total_revenue_today);
              $('#booking_percentage_today').text(data.percentage_change);
              $('#booking_text_change').text(data.change_text);
              $('#booking_percentage_today').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching booking revenue data: ' + error);
          }
      });
  }

  // Function to animate the booking revenue display
  function animateBookingRevenue(newRevenue) {
      var currentRevenue = parseInt($('#booking_sales_today').text().replace(/[^\d]/g, ''));
      var difference = newRevenue - currentRevenue;
      var animationDuration = 1000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentRevenue;

      var timer = setInterval(function() {
          current += increment;
          $('#booking_sales_today').text('₱' + numberWithCommas(Math.round(current)));
          if (current >= newRevenue) {
              clearInterval(timer);
              $('#booking_sales_today').text('₱' + numberWithCommas(newRevenue));
          }
      }, animationDuration / frames);
  }

  // Function to add commas to a number
  function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Fetch booking revenue data initially when the page loads
  fetchBookingRevenueData();

  // Set interval to fetch booking revenue data periodically (every 5 seconds)
  setInterval(fetchBookingRevenueData, 2000);
});

</script>


<script>
$(document).ready(function(){
  // Function to fetch booking revenue data from the server
  function fetchBookingRevenueData() {
      $.ajax({
          url: 'functions/fetch_booking_monthly_sales.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateBookingRevenue(data.total_revenue_current_month);
              $('#booking_percentage_month').text(data.percentage_change);
              $('#booking_text_change_month').text(data.change_text);
              $('#booking_percentage_month').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching booking revenue data: ' + error);
          }
      });
  }

  // Function to animate the booking revenue display
  function animateBookingRevenue(newRevenue) {
      var currentRevenue = parseInt($('#booking_sales_month').text().replace(/[^\d]/g, ''));
      var difference = newRevenue - currentRevenue;
      var animationDuration = 1000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentRevenue;

      var timer = setInterval(function() {
          current += increment;
          $('#booking_sales_month').text('₱' + numberWithCommas(Math.round(current)));
          if (current >= newRevenue) {
              clearInterval(timer);
              $('#booking_sales_month').text('₱' + numberWithCommas(newRevenue));
          }
      }, animationDuration / frames);
  }

  // Function to add commas to a number
  function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Fetch booking revenue data initially when the page loads
  fetchBookingRevenueData();

  // Set interval to fetch booking revenue data periodically (every 5 seconds)
  setInterval(fetchBookingRevenueData, 2000);
});


</script>

<script>
$(document).ready(function(){
// Function to fetch yearly revenue data from the server
function fetchYearlyRevenueData() {
    $.ajax({
        url: 'functions/fetch_booking_yearly_revenue.php', // URL of your PHP script
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);
            animateYearlyRevenue(data.total_revenue_current_year);
            $('#booking_percentage_year').text(data.percentage_change);
            $('#booking_text_change_year').text(data.change_text);
            $('#booking_percentage_year').removeClass('text-danger text-success').addClass(data.class);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching yearly revenue data: ' + error);
        }
    });
}

// Function to animate the yearly revenue display
function animateYearlyRevenue(newRevenue) {
    var currentRevenue = parseInt($('#booking_sales_year').text().replace(/[^\d]/g, ''));
    var difference = newRevenue - currentRevenue;
    var animationDuration = 1000; // Animation duration in milliseconds
    var frames = 60; // Number of frames for animation
    var increment = difference / frames;
    var current = currentRevenue;

    var timer = setInterval(function() {
        current += increment;
        $('#booking_sales_year').text('₱' + numberWithCommas(Math.round(current)));
        if (current >= newRevenue) {
            clearInterval(timer);
            $('#booking_sales_year').text('₱' + numberWithCommas(newRevenue));
        }
    }, animationDuration / frames);
}

// Function to add commas to a number
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Fetch yearly revenue data initially when the page loads
fetchYearlyRevenueData();

// Set interval to fetch yearly revenue data periodically (every 5 seconds)
setInterval(fetchYearlyRevenueData, 5000);
});

</script>

<script>

$(document).ready(function(){
// Function to fetch overall revenue data from the server
function fetchOverallRevenueData() {
    $.ajax({
        url: 'functions/fetch_booking_overall_revenue.php', // URL of your PHP script
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);
            animateOverallRevenue(data.overall_revenue);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching overall revenue data: ' + error);
        }
    });
}

// Function to animate the overall revenue display
function animateOverallRevenue(newRevenue) {
    var currentRevenue = parseInt($('#overall_sales').text().replace(/[^\d]/g, ''));
    var difference = newRevenue - currentRevenue;
    var animationDuration = 1000; // Animation duration in milliseconds
    var frames = 60; // Number of frames for animation
    var increment = difference / frames;
    var current = currentRevenue;

    var timer = setInterval(function() {
        current += increment;
        $('#overall_sales').text('₱' + numberWithCommas(Math.round(current)));
        if (current >= newRevenue) {
            clearInterval(timer);
            $('#overall_sales').text('₱' + numberWithCommas(newRevenue));
        }
    }, animationDuration / frames);
}

// Function to add commas to a number
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Fetch overall revenue data initially when the page loads
fetchOverallRevenueData();

// Set interval to fetch overall revenue data periodically (every 5 seconds)
setInterval(fetchOverallRevenueData, 2000);
});

</script>


<script>


$(document).ready(function(){
  // Function to fetch approved bookings today data from the server
  function fetchApprovedBookingsTodayData() {
      $.ajax({
          url: 'functions/fetch_approved_bookings_today.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateApprovedBookingsToday(data.total_approved_today);
              $('#approved_percentage_change').text(data.percentage_change);
              $('#approved_text_change').text(data.change_text);
              $('#approved_percentage_change').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching approved bookings today data: ' + error);
          }
      });
  }

  // Function to animate the approved bookings today display
  function animateApprovedBookingsToday(newCount) {
      var currentCount = parseInt($('#approved_today_count').text());
      var difference = newCount - currentCount;
      var animationDuration = 2000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentCount;

      var timer = setInterval(function() {
          current += increment;
          $('#approved_today_count').text(Math.round(current));
          if (current >= newCount) {
              clearInterval(timer);
              $('#approved_today_count').text(newCount);
          }
      }, animationDuration / frames);
  }

  // Fetch approved bookings today data initially when the page loads
  fetchApprovedBookingsTodayData();

  // Set interval to fetch approved bookings today data periodically (every 2 seconds)
  setInterval(fetchApprovedBookingsTodayData, 2000);
});




</script>




<script>


$(document).ready(function(){
  // Function to fetch approved bookings current month data from the server
  function fetchApprovedBookingsCurrentMonthData() {
      $.ajax({
          url: 'functions/fetch_approved_bookings_current_month.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateApprovedBookingsCurrentMonth(data.total_approved_current_month);
              $('#approved_current_month_percentage_change').text(data.percentage_change);
              $('#approved_current_month_text_change').text(data.change_text);
              $('#approved_current_month_percentage_change').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching approved bookings current month data: ' + error);
          }
      });
  }

  // Function to animate the approved bookings current month count
  function animateApprovedBookingsCurrentMonth(newCount) {
      var currentCount = parseInt($('#approved_current_month_count').text());
      var difference = newCount - currentCount;
      var animationDuration = 1000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentCount;

      var timer = setInterval(function() {
          current += increment;
          $('#approved_current_month_count').text(Math.round(current));
          if (current >= newCount) {
              clearInterval(timer);
              $('#approved_current_month_count').text(newCount);
          }
      }, animationDuration / frames);
  }

  // Fetch approved bookings current month data initially when the page loads
  fetchApprovedBookingsCurrentMonthData();

  // Set interval to fetch approved bookings current month data periodically (every 5 seconds)
  setInterval(fetchApprovedBookingsCurrentMonthData, 2000);
});



</script>



<script>


$(document).ready(function(){
  // Function to fetch approved bookings current year data from the server
  function fetchApprovedBookingsCurrentYearData() {
      $.ajax({
          url: 'functions/fetch_approved_bookings_current_year.php', // URL of your PHP script
          type: 'GET',
          success: function(response) {
              var data = JSON.parse(response);
              animateApprovedBookingsCurrentYear(data.total_approved_current_year);
              $('#approved_current_year_percentage_change').text(data.percentage_change);
              $('#approved_current_year_text_change').text(data.change_text);
              $('#approved_current_year_percentage_change').removeClass('text-danger text-success').addClass(data.class);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching approved bookings current year data: ' + error);
          }
      });
  }

  // Function to animate the approved bookings current year count
  function animateApprovedBookingsCurrentYear(newCount) {
      var currentCount = parseInt($('#approved_current_year_count').text());
      var difference = newCount - currentCount;
      var animationDuration = 1000; // Animation duration in milliseconds
      var frames = 60; // Number of frames for animation
      var increment = difference / frames;
      var current = currentCount;

      var timer = setInterval(function() {
          current += increment;
          $('#approved_current_year_count').text(Math.round(current));
          if (current >= newCount) {
              clearInterval(timer);
              $('#approved_current_year_count').text(newCount);
          }
      }, animationDuration / frames);
  }

  // Fetch approved bookings current year data initially when the page loads
  fetchApprovedBookingsCurrentYearData();

  // Set interval to fetch approved bookings current year data periodically (every 5 seconds)
  setInterval(fetchApprovedBookingsCurrentYearData, 2000);
});


</script>

<script>

$(document).ready(function(){
    // Function to fetch overall approved bookings data from the server
    function fetchOverallApprovedBookingsData() {
        $.ajax({
            url: 'functions/fetch_overall_approved_bookings.php', // URL of your PHP script
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);
                $('#overall_approved_count').text(data.total_approved);
                $('#overall_approved_text').text(data.text);
                animateApprovedBookingsCurrentYear(data.total_approved); // Call the animation function
            },
            error: function(xhr, status, error) {
                console.error('Error fetching overall approved bookings data: ' + error);
            }
        });
    }

    // Function to animate the approved bookings count for the current year
    function animateApprovedBookingsCurrentYear(newCount) {
        var currentCount = parseInt($('#approved_current_year_count').text());
        var difference = newCount - currentCount;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentCount;

        var timer = setInterval(function() {
            current += increment;
            $('#approved_current_year_count').text(Math.round(current));
            if (current >= newCount) {
                clearInterval(timer);
                $('#approved_current_year_count').text(newCount);
            }
        }, animationDuration / frames);
    }

    // Fetch overall approved bookings data initially when the page loads
    fetchOverallApprovedBookingsData();

    // Set interval to fetch overall approved bookings data periodically (every 5 seconds)
    setInterval(fetchOverallApprovedBookingsData, 2000);
});




</script>


<script>
$(document).ready(function(){
    // Function to fetch ratings data from the server
    function fetchRatingsData() {
        $.ajax({
            url: 'functions/fetch_ratings_data.php', // URL of your PHP script
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);
                animateRatingsTotal(data.averageRating.toFixed(1));
                $('#ratings_text_change').text(data.text);
                $('#ratings_text_change').removeClass('text-danger text-warning text-primary text-success').addClass(data.class);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching ratings data: ' + error);
            }
        });
    }

    // Animation function for ratings total
    function animateRatingsTotal(newRating) {
        var currentRating = parseFloat($('#ratings_total').text());
        var difference = newRating - currentRating;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRating;

        var timer = setInterval(function() {
            current += increment;
            $('#ratings_total').text(current.toFixed(1) + ' Stars');
            if ((difference > 0 && current >= newRating) || (difference < 0 && current <= newRating)) {
                clearInterval(timer);
                $('#ratings_total').text(newRating.toFixed(1) + ' Stars');
            }
        }, animationDuration / frames);
    }

    // Fetch ratings data initially when the page loads
    fetchRatingsData();

    // Set interval to fetch ratings data periodically (every 5 seconds)
    setInterval(fetchRatingsData, 2000);
});




</script>
