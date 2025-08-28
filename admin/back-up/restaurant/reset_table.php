<?php
// Start the session
session_start();

// Clear the cart session variable
$_SESSION['cart'] = array();

// Your logic to reset the table content (e.g., fetching updated rows and total price)
// Assuming you have a function or logic to generate the table rows and calculate the total price
$rows = ''; // This should be filled with the updated table rows HTML
$totalPrice = 0; // This should be updated with the new total price

// Here you would generate the updated table rows and calculate the total price based on the session data
// Example:
// foreach ($_SESSION['cart'] as $item) {
//     // Generate rows and calculate total price
//     $rows .= "<tr>...</tr>";
//     $totalPrice += $item['quantity'] * $item['price'];
// }

// Prepare the response array
$response = array(
    'rows' => $rows,
    'totalPrice' => $totalPrice,
);

// Send the response as JSON
echo json_encode($response);
