<?php
// Start the session
session_start();

// Fetch the data sent from the client side
$id = $_POST['id'];
$foodName = $_POST['foodName'];
$price = $_POST['price'];
$image = $_POST['image'];

// Check if the cart is empty or not set
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the item is already in the cart
$existingItemKey = array_search($id, array_column($_SESSION['cart'], 'id'));

if ($existingItemKey !== false) {
    // Increment the quantity
    $_SESSION['cart'][$existingItemKey]['quantity']++;
} else {
    // Add the new item to the cart
    $_SESSION['cart'][] = array(
        'id' => $id,
        'foodName' => $foodName,
        'price' => $price,
        'image' => $image,
        'quantity' => 1,
        'total' => $price
    );
}

// Prepare the table rows HTML
$tableRows = '';
$totalPrice = 0; // Initialize total price variable

foreach ($_SESSION['cart'] as $item) {
    // Calculate total for each item
    $itemTotal = $item['quantity'] * $item['price'];
    $totalPrice += $itemTotal; // Add item total to total price

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

// Echo the table rows HTML and total price to send it back to the client side
echo json_encode(array('rows' => $tableRows, 'totalPrice' => $totalPrice));
?>
