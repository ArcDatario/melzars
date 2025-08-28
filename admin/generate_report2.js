function handleFormSubmission(event) {
    event.preventDefault();

    // Get the start and end dates from the input fields
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;

    // Format the dates for display
    var startDateFormatted = formatDate(startDate);
    var endDateFormatted = formatDate(endDate);

    var dateRange = `From: ${startDateFormatted} to ${endDateFormatted}`;

    // Start the AJAX request chain
    calculateTotal(startDate, endDate)
        .then(total => {
            return fetchRatingsCard().then(ratingsCardContent => ({
                total,
                ratingsCardContent
            }));
        })
        .then(data => {
            return fetchStatusCounts(startDate, endDate).then(statusCounts => ({
                ...data,
                statusCounts
            }));
        })
        .then(data => {
            return fetchRentalData(startDate, endDate).then(rentalData => ({
                ...data,
                rentalData
            }));
        })
        .then(data => {
            return fetchOrdersData(startDate, endDate).then(ordersData => ({
                ...data,
                ordersData
            }));
        })
        .then(data => {
            generatePrintWindow(dateRange, data.total, data.ratingsCardContent, data.statusCounts, data.rentalData, data.ordersData);
        })
        .catch(error => {
            console.error("Error processing report:", error);
            alert("Error processing report. Please try again.");
        });
}

// Helper function to format date
function formatDate(date) {
    return new Date(date).toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
}

// Helper function to add commas to numbers
function numberWithCommas(x) {
    return parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// AJAX call to calculate total
function calculateTotal(startDate, endDate) {
    return $.ajax({
        url: "calculate_report.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(response => parseFloat(response))
    .catch(error => {
        console.error("Error calculating total:", error);
        throw error;
    });
}

// AJAX call to fetch ratings card content
function fetchRatingsCard() {
    return $.ajax({
        url: "fetch_ratings_card.php",
        method: "GET"
    }).then(response => response)
    .catch(error => {
        console.error("Error fetching ratings card content:", error);
        throw error;
    });
}

// AJAX call to fetch status counts
function fetchStatusCounts(startDate, endDate) {
    return $.ajax({
        url: "fetch_status_counts.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching status counts:", error);
        throw error;
    });
}

// AJAX call to fetch rental data
function fetchRentalData(startDate, endDate) {
    return $.ajax({
        url: "fetch_rental_data.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching rental data:", error);
        throw error;
    });
}

// Function to process rental data
// Function to process rental data
function processRentalData(data) {
    var processedData = [];
    var equipmentMap = {};
    data.forEach(item => {
        if (item.status !== 'Pending' && item.status !== 'Cancelled' && item.status !== 'Approved') {
            var equipmentName = item.room_name;
            if (equipmentMap[equipmentName]) {
                equipmentMap[equipmentName].total += parseFloat(item.total);
            } else {
                equipmentMap[equipmentName] = {
                    room_name: equipmentName,
                    total: parseFloat(item.total)
                };
            }
        }
    });
    for (var key in equipmentMap) {
        processedData.push(equipmentMap[key]);
    }
    return processedData;
}



function fetchOrdersData(startDate, endDate) {
    return $.ajax({
        url: "fetch_orders_data.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching orders data:", error);
        throw error;
    });
}

function processOrdersData(data) {
    var processedOrdersData = [];
    var ordersMap = {};

    data.forEach(order => {
        if (order.status !== 'Pending') {
            var foodName = order.food_name;
            if (ordersMap[foodName]) {
                ordersMap[foodName].total += parseFloat(order.total);
                ordersMap[foodName].quantity += parseInt(order.quantity); // Sum up the quantity
            } else {
                ordersMap[foodName] = {
                    food_name: foodName,
                    total: parseFloat(order.total),
                    quantity: parseInt(order.quantity) // Set quantity
                };
            }
        }
    });

    for (var key in ordersMap) {
        processedOrdersData.push(ordersMap[key]);
    }

    return processedOrdersData;
}


function getStatusColorClass(status) {
    switch (status) {
        case 'Completed':
            return 'status-green';
        case 'Pending':
            return 'status-orange';
        case 'Cancelled':
            return 'status-red';
        case 'Paid':
            return 'status-blue';
        default:
            return '';
    }
}

// Function to generate the print window
function generatePrintWindow(dateRange, total, ratingsCardContent, statusCounts, rentalData, ordersData) {
    var printWindow = window.open('', '_blank');
    var processedRentalData = processRentalData(rentalData);
    var processedOrdersData = processOrdersData(ordersData);
    var OrdersTotal = processedOrdersData.reduce((sum, item) => sum + parseFloat(item.total), 0);
    var OverallTotal = OrdersTotal + total;
    printWindow.document.write(`
        <html>
        <head>
            <title>HJP Heavy Equipment Rental Services & Aggregates</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <style>
                .status-green { color: #2A7B5C; }
                .status-orange { color: orange; }
                .status-red { color: red; }
                .status-blue { color: #1E71AC; }
                .d-inline-block { display: inline-block; margin-right: 10px; }
                .d-inline-block1 { display: inline-block; margin-right: 10px; }
                @media print {
                    .page-break { page-break-before: always; }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2 class="text-center my-4">Melzars Mountain Resort </h2>
                <div class="row mb-4">
                    <div class="col-4 text-center">
                        <img src="bg-remove.png" alt="HJP Logo" height="110" width="120" style="z-index:0; opacity:1; border-radius:7px;">
                    </div>
                    <div class="col-4" style="text-align:center; float:right; margin-top:-120px; margin-right:240px;">
                        <p>B. Del Mundo, Mansalay Oriental Mindoro</p>
                        <h4>Booking Sales Report</h4>
                        <p style="font-size:0.9rem;">${dateRange}</p>
                    </div>
                    <div class="col-4" style="float:right; margin-top:-160px; margin-left:35%;">
                        <div class="ratings-card" style=" width:120px;">${ratingsCardContent}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid black;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="width:100%; border-bottom:1px solid grey;">
                        <table class="table table-lg" style="font-size:0.9rem; width:100%">
                            <thead style="text-align:left;">
                                <tr><th>Room</th><th>Summary</th><th>Status</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                            ${rentalData.map(item => `
                             <tr>
                                    <td>${item.room_name}</td>
                                    <td>${item.days_night}</td>
                                    <td class="${getStatusColorClass(item.status)}">${item.status}</td>
                                 <td>${numberWithCommas(item.total)}</td>
                                </tr>`).join('')}
                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-sm" style="font-size:0.9rem; width:50%;">
                        <h4>Summary <span style="font-size:0.7rem; font-weight:400; opacity:0.5;">(Calculates only occupied and completed bookings.)</span> <span style="font-size:0.8rem; color:green; opcaity:0.5;">Completed - ${statusCounts.completed_count}</span>,
                        <span style="font-size:0.8rem; color:green; opcaity:0.5;">Occupied - ${statusCounts.occupied_count}</span>,
                        <span style="font-size:0.8rem; color:green; opcaity:0.5;">Approved - ${statusCounts.approved_count}</span>,
                        <span style="font-size:0.8rem; color:orange; opcaity:0.5;">Pending - ${statusCounts.pending_count}</span>,
                        <span style="font-size:0.8rem; color:red; opcaity:0.5;">Cancelled - ${statusCounts.cancelled_count}</span></h4>
                            <thead style="text-align:left;">
                                <tr><th>Room</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                            ${processedRentalData.map(item => `<tr><td>${item.room_name}</td><td>${numberWithCommas(item.total)}</td></tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid grey;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 text-right">
                        <h4>Total: ₱ ${numberWithCommas(total)}</h4>
                    </div>
                </div>
                <div class="row"></div>
            </div>
            <div class="page-break"></div>
            <div class="container">
                <h2 class="text-center my-4">Melzars Mountain Resort </h2>
                <div class="row mb-4">
                    <div class="col-4 text-center">
                        <img src="bg-remove.png" alt="HJP Logo" height="110" width="120" style="z-index:0; opacity:1; border-radius:7px;">
                    </div>
                    <div class="col-4" style="text-align:center; float:right; margin-top:-120px; margin-right:240px;">
                        <p>B. Del Mundo, Mansalay Oriental Mindoro</p>
                        <h4>Restaurant Sales Report</h4>
                        <p style="font-size:0.9rem;">${dateRange}</p>
                    </div>
                    <div class="col-4" style="float:right; margin-top:-160px; margin-left:35%;">
                        <div class="ratings-card" style=" width:120px;">${ratingsCardContent}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid black;"></div>
                </div>
                <div class="row mb-4">
                    
                    <div class="col-md-4">
                    <table class="table table-sm" style="font-size:0.9rem; width:100%;">
                    <thead style="text-align:left;">
                        <tr>
                            <th>Food</th>
                            <th>Quantity</th>
                            <th>Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${processedOrdersData.map(item => `
                            <tr>
                                <td>${item.food_name}</td>
                                <td style="text-align:left;">${item.quantity}x</td>
                                <td>${numberWithCommas(item.total)}</td>
                            </tr>`).join('')}
                    </tbody>
                </table>
                
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid grey;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 text-right">
                    <h4>Total: ₱ ${numberWithCommas(OrdersTotal)}</h4>
                    </div>
                </div>
                <div class="row" style="width:100%; border:1.3px solid black;"></div>
                <div class="col-12" style="text-align:right;">
                <h2>Overall: ₱ ${numberWithCommas(OverallTotal)}</h2>
                </div>
            </div>
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();
    
    printWindow.onload = function () {
        printWindow.print();
        printWindow.onafterprint = function () {
            printWindow.close();
        };
    };
}

// Attach the form submission handler to the form
document.getElementById("generate_report_form").addEventListener("submit", handleFormSubmission);
