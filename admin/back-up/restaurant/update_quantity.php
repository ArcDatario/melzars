<?php
// Start the session
session_start();

// Fetch the action and item ID sent from the client side
$action = $_POST['action'];
$itemId = $_POST['itemId'];

// Check if the action is valid and the item ID is present
if ($action && $itemId) {
    // Check if the cart is empty or not set
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Loop through the cart items to find the item with the matching ID
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $itemId) {
                // Update the quantity based on the action
                if ($action == 'increment') {
                    $_SESSION['cart'][$key]['quantity']++;
                } elseif ($action == 'decrement') {
                    if ($_SESSION['cart'][$key]['quantity'] > 1) {
                        $_SESSION['cart'][$key]['quantity']--;
                    } else {
                        // Remove the item from the cart if quantity is 1 and action is decrement
                        unset($_SESSION['cart'][$key]);
                    }
                }
                break; // Stop looping once the item is found and updated
            }
        }
    }

    // Prepare the updated table rows HTML and total price
    $tableRows = '';
    $totalPrice = 0; // Initialize total price variable

    foreach ($_SESSION['cart'] as $item) {
        // Calculate total for each item
        $itemTotal = $item['quantity'] * $item['price'];
        $totalPrice += $itemTotal; // Add item total to total price

        // Generate HTML for the table rows with updated quantities
        $tableRows .= "<tr>
                        <td><img src='food_images/{$item['image']}' alt='' style='height:75px; width:100px;'></td>
                        <td class='fw-bold' style='text-align:center;'>{$item['quantity']}</td>
                        <td><a href='#' class='text-primary fw-bold'>{$item['foodName']}</a></td>
                        <td>{$item['price']}</td>
                        <td>{$itemTotal}</td>
                        <td>
                          <button class='quantity-btn' data-id='{$item['id']}' data-action='increment'>+</button>
                          <button class='quantity-btn' data-id='{$item['id']}' data-action='decrement'>-</button>

                        </td>
                    </tr>";
    }

    // Echo the updated table rows HTML and total price as JSON response
    echo json_encode(array('rows' => $tableRows, 'totalPrice' => $totalPrice));
} else {
    // Handle invalid request or missing parameters
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Invalid request. Action or item ID is missing.'));
}
?>
