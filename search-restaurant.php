<?php
// Database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "restaurant_booking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the request
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL statement
$sql = "SELECT name, address, menu, price FROM restaurants WHERE name LIKE ? OR address LIKE ? OR menu LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$searchTerm%";
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();

$result = $stmt->get_result();

// Check if any results were returned
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Location</th><th>Menu</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['menu']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
