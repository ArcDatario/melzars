<div class="col-12">
  <div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <!-- Dropdown items can go here -->
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Rating Stars Graph <span>/By Month</span></h5>

      <!-- The div where the chart will be rendered -->
      <div id="RatingsreportsChart"></div>

      <!-- Include ApexCharts Library -->
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

      <script>
        // Fetch the star counts from the PHP script
        fetch('getStarCounts.php') // Replace with the correct path to your PHP file
          .then(response => response.json())  // Parse the JSON data
          .then(data => {
            // Create the chart options
            var options = {
              series: [{
                name: 'Star Rating Count',
                data: data // Star counts from the PHP response
              }],
              chart: {
                type: 'bar',
                height: 350
              },
              plotOptions: {
                bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'
                }
              },
              dataLabels: {
                enabled: false
              },
              xaxis: {
                categories: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'], // Categories for the x-axis
                title: {
                  text: 'Star Ratings'
                }
              },
              yaxis: {
                title: {
                  text: 'Number of Feedbacks'
                }
              },
              title: {
                text: 'Rating Stars Distribution'
              }
            };

            // Create a new ApexCharts instance and render the chart
            var chart = new ApexCharts(document.querySelector("#RatingsreportsChart"), options);
            chart.render();
          })
          .catch(error => console.error('Error fetching data:', error)); // Error handling
      </script>

    </div>
  </div>
</div>
