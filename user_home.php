
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "real__estate");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Home - Property Listings</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Available Properties</h3>

    <form method="GET" action="user_home.php">
        <label>Location:</label>
        <select name="location">
            <option value="">All</option>
            <option value="Chennai">Chennai</option>
            <option value="Mumbai">Mumbai</option>
        </select>
        <label>Max Price:</label>
        <input type="number" name="max_price" placeholder="e.g. 5000000">
        <input type="submit" value="Filter">
    </form>
    <hr>

<?php
$where = [];
if (!empty($_GET['location'])) {
    $location = $conn->real_escape_string($_GET['location']);
    $where[] = "location = '$location'";
}
if (!empty($_GET['max_price'])) {
    $max_price = (int)$_GET['max_price'];
    $where[] = "price <= $max_price";
}
$filter = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

$sql = "SELECT * FROM property $filter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li><strong>{$row['name']}</strong> - {$row['location']} - ₹{$row['price']}
            <a href='book_property.php?name=" . urlencode($row['name']) . "'>Book Now</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>No properties found.</p>";
}
$conn->close();
?>
</body>
</html>
