
<!DOCTYPE html>
<html>
<head><title>Book Property</title></head>
<body>
<h2>Booking Confirmation</h2>
<?php
if (isset($_GET['name'])) {
    $property_name = $_GET['name'];
    echo "<p>You have successfully booked: <strong>$property_name</strong></p>";
    // In real app, insert booking into DB
}
?>
<a href="index.php">Back to Home</a>
</body>
</html>
