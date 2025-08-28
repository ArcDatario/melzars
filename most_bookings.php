<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs Table</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Icons (optional for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/2.5.0/remixicon.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h3 class="text-center">Room Booking Logs</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Room</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include 'conn.php';

                // Fetch data from the bookings table
                $query = "SELECT id, room_name FROM bookings";
                $result = $conn->query($query);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Display each row inside the table body
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['room_name']) . "</td>";
                        echo "<td>
                                <button class='btn btn-primary btn-sm edit-btn' data-logs-id='" . $row['id'] . "'><i class='ri-edit-box-line'></i> Edit</button>
                                <button class='btn btn-danger btn-sm delete-btn' data-logs-id='" . $row['id'] . "'><i class='ri-delete-bin-line'></i> Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No logs available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS (optional for functionality like modals) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include SweetAlert for confirmation dialogs -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!-- Include your custom JS (optional for editing and deleting functionality) -->
    <script src="delete.js"></script> <!-- If you have delete logic in a separate file -->
</body>

</html>
