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
  }
  
  function showBookingThisWeek() {
    // Show the booking for this week
    document.getElementById('approved_booking_this_week').style.display = 'block';
    // Hide the bookings for this month and this year
    document.getElementById('approved_booking_this_yesterday').style.display = 'none';
    document.getElementById('approved_booking_this_month').style.display = 'none';
    document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('overall_booking').style.display = 'none';
    document.getElementById('approved_booking_today').style.display = 'none';
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
  }
  
  function showOverallBooking() {
    // Show the overall booking
    document.getElementById('overall_booking').style.display = 'block';
    // Hide the bookings for today and this month
    document.getElementById('approved_booking_this_year').style.display = 'none';
    document.getElementById('approved_booking_this_yesterday').style.display = 'none';
    document.getElementById('approved_booking_today').style.display = 'none';
    document.getElementById('approved_booking_this_month').style.display = 'none';
    document.getElementById('approved_booking_this_week').style.display = 'none';
  }
  
  // Function to show revenue for this day
  function showRevenueThisDay() {
    // Show the revenue for today
    document.getElementById('revenue_today').style.display = 'block';
    // Hide the revenue for yesterday, this month, this year, and overall
    document.getElementById('revenue_this_yesterday').style.display = 'none';
    document.getElementById('revenue_this_month').style.display = 'none';
    document.getElementById('revenue_this_year').style.display = 'none';
    document.getElementById('overall_revenue').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  }
  
  function showRevenueThisYesterday() {
    // Show the revenue for yesterday
    document.getElementById('revenue_this_yesterday').style.display = 'block';
    document.getElementById('revenue_today').style.display = 'none';
    // Hide the revenue for today, this month, this year, and overall
    document.getElementById('revenue_this_month').style.display = 'none';
    document.getElementById('revenue_this_year').style.display = 'none';
    document.getElementById('overall_revenue').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  }
  
  function showRevenueThisMonth() {
    // Show the revenue for this month
    document.getElementById('revenue_this_month').style.display = 'block';
    // Hide the revenue for today, yesterday, this year, and overall
    document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('revenue_this_year').style.display = 'none';
    document.getElementById('revenue_this_yesterday').style.display = 'none';
    document.getElementById('overall_revenue').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  }
  
  // Function to show revenue for this year
  function showRevenueThisYear() {
    // Show the revenue for this year
    document.getElementById('revenue_this_year').style.display = 'block';
    // Hide the revenue for today, this month, yesterday, and overall
    document.getElementById('revenue_this_month').style.display = 'none';
    document.getElementById('revenue_this_yesterday').style.display = 'none';
    document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('overall_revenue').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  }
  
  function showOverallRevenue() {
    // Show the overall revenue
    document.getElementById('overall_revenue').style.display = 'block';
    // Hide the revenue for today, this month, this year, and yesterday
    document.getElementById('revenue_this_month').style.display = 'none';
    document.getElementById('revenue_this_yesterday').style.display = 'none';
    document.getElementById('revenue_this_year').style.display = 'none';
    document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('revenue_this_week').style.display = 'none';
  }
  
  function showRevenueThisWeek() {
    // Show the revenue for this week
    document.getElementById('revenue_this_week').style.display = 'block';
    // Hide the revenue for today, this month, this year, and yesterday
    document.getElementById('revenue_this_month').style.display = 'none';
    document.getElementById('revenue_this_year').style.display = 'none';
    document.getElementById('revenue_this_yesterday').style.display = 'none';
    document.getElementById('revenue_today').style.display = 'none';
    document.getElementById('overall_revenue').style.display = 'none';
  }
  
  function showRestaurantRevenueThisDay() {
    // Show the restaurant revenue for today
    document.getElementById('restaurant_revenue_today').style.display = 'block';
    // Hide the restaurant revenue for yesterday, this month, this year, and overall
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
  }
  
  function showRestaurantRevenueThisYesterday() {
    // Show the restaurant revenue for yesterday
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'block';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    // Hide the restaurant revenue for today, this month, this year, and overall
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
  }
  
  function showRestaurantRevenueThisMonth() {
    // Show the restaurant revenue for this month
    document.getElementById('restaurant_revenue_this_month').style.display = 'block';
    // Hide the restaurant revenue for today, yesterday, this year, and overall
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
  }
  
  function showRestaurantRevenueThisYear() {
    // Show the restaurant revenue for this year
    document.getElementById('restaurant_revenue_this_year').style.display = 'block';
    // Hide the restaurant revenue for this month, yesterday, today, and overall
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
  }
  
  function showRestaurantOverallRevenue() {
    // Show the overall restaurant revenue
    document.getElementById('restaurant_overall_revenue').style.display = 'block';
    // Hide the restaurant revenue for this month, yesterday, this year, today, and this week
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_revenue_this_week').style.display = 'none';
  }
  
  function showRestaurantRevenueThisWeek() {
    // Show the restaurant revenue for this week
    document.getElementById('restaurant_revenue_this_week').style.display = 'block';
    // Hide the restaurant revenue for this month, yesterday, this year, today, and overall
    document.getElementById('restaurant_revenue_this_month').style.display = 'none';
    document.getElementById('restaurant_revenue_this_year').style.display = 'none';
    document.getElementById('restaurant_revenue_this_yesterday').style.display = 'none';
    document.getElementById('restaurant_revenue_today').style.display = 'none';
    document.getElementById('restaurant_overall_revenue').style.display = 'none';
  }
  
  function bookings_chart() {
    // Show the bookings chart
    document.getElementById('bookings_chart').style.display = 'block';
    // Hide the restaurant chart
    document.getElementById('restaurant_chart').style.display = 'none';
  }
  
  function restaurant_chart() {
    // Show the restaurant chart
    document.getElementById('restaurant_chart').style.display = 'block';
    // Hide the bookings chart
    document.getElementById('bookings_chart').style.display = 'none';
  }
  
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
    } else if (currentBooking === 'overall') {
      showOverallBooking();
    } else if (currentBooking === 'approved_this_week') {
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
    } else if (currentRevenue === 'overall_revenue') {
      showOverallRevenue();
    } else if (currentRevenue === 'revenue_this_week') {
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
    } else if (currentRestaurantRevenue === 'restaurant_overall_revenue') {
      showRestaurantOverallRevenue();
    } else if (currentRestaurantRevenue === 'restaurant_revenue_this_week') {
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
  