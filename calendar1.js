function convertDateFormat(dateString) {
      // Split the date string into day, month, and year
      var parts = dateString.split('-');
      // Rearrange the parts into yyyy-mm-dd format
      var convertedDate = parts[2] + '-' + parts[1] + '-' + parts[0];
      return convertedDate;
  }

  // Function to calculate total cost and number of days/nights
  function calculateTotal() {
  // Get the values of check-in and check-out dates
  var dateInValue = $("#convert_date_in").val();
  var dateOutValue = $("#convert_date_out").val();

  // Calculate the number of nights only if both dates are selected
  if (dateInValue && dateOutValue) {
      // Parse the dates
      var dateIn = new Date(dateInValue);
      var dateOut = new Date(dateOutValue);

      // Calculate the time difference in milliseconds
      var timeDiff = dateOut.getTime() - dateIn.getTime();

      // If check-out date is the same as check-in date
      if (timeDiff === 0) {
          var nights = 1; // If the dates are the same, it's considered 1 night
          var days = 1; // If the dates are the same, it's considered 1 day
      } else {
          // Calculate the number of nights
          var nights = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convert milliseconds to days
          // Calculate the number of days
          var days = Math.floor(timeDiff / (1000 * 3600 * 24)) + 1; // Include the check-in day in the count
      }

      // Get the price per night
      var pricePerNight = parseFloat($("#price_per_night").val());

      // Calculate the total cost
      var total = nights * pricePerNight;

      // Format the days and nights strings to use singular when there's only one
      var daysString = days === 1 ? "1 day" : days + " days";
      var nightsString = nights === 1 ? "1 night" : nights + " nights";

      // Update the days_night and total elements with the calculated values
      $("#days_night").text(daysString + ", " + nightsString);
      $("#total").text("Total: ₱ " + total.toFixed(2)); // Assuming you want to display the total with 2 decimal places

      // Update the additional input fields with the calculated values
      $("#days_night_input").val(daysString + ", " + nightsString);
      $("#total_input").val(total.toFixed(2)); // Assuming you want to display the total with 2 decimal places
  }
}




  // Function to update the convert_date_in and convert_date_out input fields with the converted date format
  function updateConvertedDates() {
      var dateInValue = $("#date-in").val();
      var dateOutValue = $("#date-out").val();

      if (dateInValue) {
          var convertedDateIn = convertDateFormat(dateInValue);
          $("#convert_date_in").val(convertedDateIn);
      }

      if (dateOutValue) {
          var convertedDateOut = convertDateFormat(dateOutValue);
          $("#convert_date_out").val(convertedDateOut);
      }

      // Recalculate total when dates change
      calculateTotal();
  }

  // Initially update the converted date input fields, total, and days_night
  $(document).ready(function() {
      // Bind change event to date inputs
      $("#date-in, #date-out, #price_per_night").change(function() {
          updateConvertedDates();
      });
  });
