
<?php
// Database connection (adjust credentials as needed)
$conn = new mysqli("localhost", "root", "", "real_estate");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Property</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Search Property</h2>
    <form action="search_property.php" method="GET">
        <label>Location:</label>
        <select name="location">
            <option value="Chennai">Chennai</option>
            <option value="Mumbai">Mumbai</option>
        </select>
        <label>Max Price:</label>
        <input type="number" name="max_price" placeholder="e.g. 5000000">
        <input type="submit" value="Search">
    </form>
    <hr>

<?php
if (isset($_GET['location']) && isset($_GET['max_price'])) {
    $location = $conn->real_escape_string($_GET['location']);
    $max_price = (int)$_GET['max_price'];

    $sql = "SELECT * FROM property WHERE location = '$location' AND price <= $max_price";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Available Properties:</h3><ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li><strong>{$row['name']}</strong> - ₹{$row['price']} 
                <a href='book_property.php?name=" . urlencode($row['name']) . "'>Book Now</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No properties found matching your criteria.</p>";
    }
}
$conn->close();
?>
</body>
</html>
