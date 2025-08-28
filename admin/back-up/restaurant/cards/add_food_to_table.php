<?php
// Handle the AJAX request to add food to the table
session_start();
// Fetch the data sent from the client side
$id = $_POST['id'];
$foodName = $_POST['foodName'];
$price = $_POST['price'];

// Calculate total (assuming quantity is 1 for simplicity)
$total = $price;

// Prepare the table row HTML
$tableRow = "<tr>
                <th scope='row'><a href='#'><img src='assets/img/product-1.jpg' alt=''></a></th>
                <td class='fw-bold'>1</td>
                <td><a href='#' class='text-primary fw-bold'>$foodName</a></td>
                <td>$price</td>
                <td>$total</td>
            </tr>";

// Echo the table row HTML to send it back to the client side
echo $tableRow;
?>
