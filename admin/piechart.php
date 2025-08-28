
<div class="card">
            
            <div class="card-body">
              <h5 class="card-title">Restaurant<span>| Best Seller</span></h5>

              <div class="radial-bar-chart" id="radial-bar-chart" style="height:350px; width:100%;"></div>
                     
            </div>
          </div>

          <script>
    fetch('functions/best-seller.php')
    .then(response => response.json())
    .then(data => {
      // Process data for ApexCharts
      var foodNames = [];
      var quantities = [];

      data.forEach(item => {
        foodNames.push(item.food_name);
        quantities.push(item.quantity);
      });

      // ApexCharts configuration
      var options = {
        series: quantities,
        chart: {
          type: 'radialBar',
          height: '100%',
          width: '100%',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '30%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            },
            barLabels: {
              enabled: true,
              useSeriesColors: true,
              fontSize: '8px', // Set font size to 8px
              formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
              },
            },
          }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'], // Add more colors as needed
        labels: foodNames, // Use foodNames array as labels
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              show: false
            }
          }
        }]
      };

      // Render ApexCharts
      var chart = new ApexCharts(document.querySelector("#radial-bar-chart"), options);
      chart.render();
    })
    .catch(error => console.error('Error fetching data:', error));
</script>


