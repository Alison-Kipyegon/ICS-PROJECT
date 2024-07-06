<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Booking</title>
    <link rel="stylesheet" href="searchbar.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Restaurant</h1>
        <form id="searchForm">
            <input type="text" id="searchBar" placeholder="Search menu...">
            <button type="button" onclick="searchMenu()">Search</button>
        </form>
    </header>
    <main id="menuResults">
        <!-- Menu items will be displayed here -->
    </main> 
    <script src="searchbar.js"></script>
</body>
</html>
