<?php
include "conn.php";

if (isset($_POST['room_id'])) {
    $roomId = $_POST['room_id'];
    $stmt = $conn->prepare("SELECT * FROM rooms_tbl WHERE id = ?");
    $stmt->bind_param('i', $roomId);
    $stmt->execute();
    $result = $stmt->get_result();
    $room = $result->fetch_assoc();
    echo json_encode($room);
}

$conn->close();
?>
