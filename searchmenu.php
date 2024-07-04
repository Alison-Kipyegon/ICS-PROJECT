<?php
include 'db_connect.php';

$q = $_GET['q'];

$sql = "SELECT * FROM menus WHERE name LIKE '%$q%' OR description LIKE '%$q%'";
$result = $conn->query($sql);

$menus = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menus[] = $row;
    }
}

echo json_encode($menus);

$conn->close();
?>
