document.addEventListener("DOMContentLoaded", () => {
           // Ajax request to fetch data from PHP file
           const xhr = new XMLHttpRequest();
           xhr.open('GET', 'fetch_data.php', true);
           xhr.onload = function () {
               if (xhr.status >= 200 && xhr.status < 300) {
                   const data = JSON.parse(xhr.responseText);

                   // Generate categories (month names)
                   const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                   // Map data to series format
                   const seriesData = months.map((month, index) => ({
                       name: month,
                       data: [data[index]]
                   }));

                   // Create the chart
                   new ApexCharts(document.querySelector("#reportsChart"), {
                       series: seriesData,
                       chart: {
                           height: 350,
                           type: 'line',
                       },
                       xaxis: {
                           categories: months
                       },
                   }).render();
               } else {
                   console.error('Failed to fetch data');
               }
           };
           xhr.send();
       });
