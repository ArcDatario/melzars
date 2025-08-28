<?php
// Database connection
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order number from the POST data
    $orderNumber = $_POST['orderNumber'];

    // Prevent SQL injection by using prepared statements
    $sql = "SELECT * FROM orders WHERE order_number = ? AND status='success'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = array();
    $badgeNumber = null;

    if ($result->num_rows > 0) {
        // Fetch the orders for the specified order number
        while ($row = $result->fetch_assoc()) {
            $orders[] = array(
                'food_name' => $row['food_name'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            );
        }

        // Fetch the badge number associated with the order
        $sqlBadge = "SELECT badge_number FROM orders WHERE order_number = ? and status='success'";
        $stmtBadge = $conn->prepare($sqlBadge);
        $stmtBadge->bind_param("i", $orderNumber);
        $stmtBadge->execute();
        $resultBadge = $stmtBadge->get_result();

        if ($resultBadge->num_rows > 0) {
            $rowBadge = $resultBadge->fetch_assoc();
            $badgeNumber = $rowBadge['badge_number'];
        }
    }

    // Send orders data and badge number as JSON response
    echo json_encode(array('orders' => $orders, 'badgeNumber' => $badgeNumber));
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}
?>
