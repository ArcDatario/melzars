<?php
// Start the session
session_start();

// Database connection
include "conn.php";

// Check if the cart is not empty
if (!empty($_SESSION['cart'])) {
    try {
        // Begin a transaction
        $conn->begin_transaction();

        // Loop through cart items to update stock
        foreach ($_SESSION['cart'] as $item) {
            $id = $item['id'];
            $quantity = $item['quantity'];

            // Fetch current stock for the item
            $sql = "SELECT stocks FROM foods_tbl WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($currentStock);
            $stmt->fetch();
            $stmt->close();

            // Calculate new stock after deduction
            $newStock = $currentStock - $quantity;

            // Update the stock in the database
            $updateSql = "UPDATE foods_tbl SET stocks = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("ii", $newStock, $id);
            $updateStmt->execute();
            $updateStmt->close();
        }

        // Commit the transaction
        $conn->commit();

        echo "Stocks updated successfully.";
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "Error updating stocks: " . $e->getMessage();
    }
} else {
    echo "Cart is empty. No stocks updated.";
}
?>
