// Function to show booking for this month
function showBookingThisMonth() {
  // Show the booking for this month
  document.getElementById('approved_booking_this_month').style.display = 'block';
  // Hide the bookings for today and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'this_month');
}

function showBookingThisYesterday() {
  // Show the booking for yesterday
  document.getElementById('approved_booking_this_yesterday').style.display = 'block';

  document.getElementById('approved_booking_today').style.display = 'none';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'yesterday');
}

// Function to show booking for today
function showBookingThisDay() {
  // Show the booking for today
  document.getElementById('approved_booking_today').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'today');
}

function showBookingThisWeek() {
  // Show the booking for today
  document.getElementById('approved_booking_this_week').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('overall_booking').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';

  // Save the state in local storage
  localStorage.setItem('current_booking', 'approved_this_week');
}

// Function to show booking for this year
function showBookingThisYear() {
  // Show the booking for this year
  document.getElementById('approved_booking_this_year').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'this_year');
}

function showOverallBooking() {
  // Show the booking for this year
  document.getElementById('overall_booking').style.display = 'block';
  // Hide the bookings for today and this month
    document.getElementById('approved_booking_this_year').style.display = 'none';
  document.getElementById('approved_booking_this_yesterday').style.display = 'none';
  document.getElementById('approved_booking_today').style.display = 'none';
  document.getElementById('approved_booking_this_month').style.display = 'none';
  document.getElementById('approved_booking_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('current_booking', 'overall');
}




// Function to show revenue for this day
function showRevenueThisDay() {
  // Show the booking for today
  document.getElementById('revenue_today').style.display = 'block';
  // Hide the bookings for this month and this year
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_today_card');
}

function showRevenueThisYesterday() {
  // Show the booking for today
  document.getElementById('revenue_this_yesterday').style.display = 'block';

  document.getElementById('revenue_today').style.display = 'none';
  // Hide the bookings for this month and this year
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_yesterday_card');
}



function showRevenueThisMonth() {
  // Show the booking for this month
  document.getElementById('revenue_this_month').style.display = 'block';
  // Hide the bookings for today and this year
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_month_card');
}


// Function to show revenue for this year
function showRevenueThisYear() {
  // Show the booking for this year
  document.getElementById('revenue_this_year').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_year_card');

}

function showOverallRevenue() {
  // Show the booking for this year
  document.getElementById('overall_revenue').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'overall_revenue');
}

function showRevenueThisWeek() {
  // Show the booking for this year
  document.getElementById('revenue_this_week').style.display = 'block';
  // Hide the bookings for today and this month
  document.getElementById('revenue_this_month').style.display = 'none';
  document.getElementById('revenue_this_year').style.display = 'none';
  document.getElementById('revenue_this_yesterday').style.display = 'none';
  document.getElementById('revenue_today').style.display = 'none';
  document.getElementById('overall_revenue').style.display = 'none';
  // Save the state in local storage
  localStorage.setItem('revenue', 'revenue_this_week');
}









  // This is on the restaurant revenue start
  // Function to show revenue for this day
  function showRestaurantRevenueThisDay() {
    // Show the booking for today
    document.getElementById('restaurant_revenue_today').style.display = 'block';
    // Hide the bookings for this month and this year
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_today');
  }

  function showRestaurantRevenueThisYesterday() {
    // Show the booking for today
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'block';

    document.getElementById('restaurant_revenue_today').style.display = 'none';
    // Hide the bookings for this month and this year
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_yesterday');
  }



  function showRestaurantRevenueThisMonth() {
    // Show the booking for this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'block';
    // Hide the bookings for today and this year
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_month');
  }


  // Function to show revenue for this year
  function showRestaurantRevenueThisYear() {
    // Show the booking for this year
    document.getElementById('restaurant_revenue_this_year').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_year');

  }

  function showRestaurantOverallRevenue() {
    // Show the booking for this year
    document.getElementById('restaurant_overall_revenue').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
      document.getElementById('restaurant_revenue_this_week').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_overall_revenue');
  }

  function showRestaurantRevenueThisWeek() {
    // Show the booking for this year
    document.getElementById('restaurant_revenue_this_week').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    // Save the state in local storage
    localStorage.setItem('restaurant_revenue', 'restaurant_revenue_this_week');
  }


  function bookings_chart() {
    // Show the booking for this year
    document.getElementById('bookings_chart').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('restaurant_chart').style.display = 'none';

    // Save the state in local storage
    localStorage.setItem('chart', 'bookings_chart');
  }

  function restaurant_chart() {
    // Show the booking for this year
    document.getElementById('restaurant_chart').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('bookings_chart').style.display = 'none';

    // Save the state in local storage
    localStorage.setItem('chart', 'restaurant_chart');
  }


  // This is on the restaurant revenue end




// Function to check and set initial display based on local storage
function checkInitialDisplay() {


  // Retrieve the state from local storage for booking
  var currentBooking = localStorage.getItem('current_booking');
  if (currentBooking === 'this_month') {
    showBookingThisMonth();
  } else if (currentBooking === 'yesterday') {
    showBookingThisYesterday();
  } else if (currentBooking === 'today') {
    showBookingThisDay();
  } else if (currentBooking === 'this_year') {
    showBookingThisYear();
  }
  else if (currentBooking === 'overall') {
    showOverallBooking();
  }
  else if (currentBooking === 'approved_this_week') {
    showBookingThisWeek();
  }




  // Retrieve the state from local storage for revenue
  var currentRevenue = localStorage.getItem('revenue');
  if (currentRevenue === 'revenue_today_card') {
    showRevenueThisDay();
  } else if (currentRevenue === 'revenue_yesterday_card') {
    showRevenueThisYesterday();
  } else if (currentRevenue === 'revenue_this_month_card') {
    showRevenueThisMonth();
  } else if (currentRevenue === 'revenue_this_year_card') {
    showRevenueThisYear();
  }
  else if (currentRevenue === 'overall_revenue') {
    showOverallRevenue();
  }
  else if (currentRevenue === 'revenue_this_week') {
    showRevenueThisWeek();
  }





  var currentRestaurantRevenue = localStorage.getItem('restaurant_revenue');
  if (currentRestaurantRevenue === 'restaurant_revenue_today') {
    showRestaurantRevenueThisDay();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_yesterday') {
    showRestaurantRevenueThisYesterday();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_month') {
    showRestaurantRevenueThisMonth();
  } else if (currentRestaurantRevenue === 'restaurant_revenue_this_year') {
    showRestaurantRevenueThisYear();
  }
  else if (currentRestaurantRevenue === 'restaurant_overall_revenue') {
    showRestaurantOverallRevenue();
  }
  else if (currentRestaurantRevenue === 'restaurant_revenue_this_week') {
    showRestaurantRevenueThisWeek();
  }




  var chart = localStorage.getItem('chart');
  if (chart === 'bookings_chart') {
    bookings_chart();
  } else if (chart === 'restaurant_chart') {
    restaurant_chart();
  }




}

// Call the function to check and set initial display when the page loads
window.onload = checkInitialDisplay;
