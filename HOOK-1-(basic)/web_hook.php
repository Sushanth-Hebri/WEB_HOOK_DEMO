<?php
// This is the webhook receiver page

// Get the incoming JSON data
$requestData = file_get_contents('php://input');
$decodedData = json_decode($requestData, true);

// Process the received data and store it in a database
if ($decodedData && isset($decodedData['message'])) {
    // Database configuration
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'web_hook_demo';

    // Create a new connection
    $connection = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    // Prepare and execute an INSERT query
    $messageToStore = $decodedData['message'];
    $sql = "INSERT INTO received_data (message) VALUES ('$messageToStore')";

    if ($connection->query($sql) === TRUE) {
        echo 'Webhook data received and stored in the database.';
    } else {
        echo 'Error storing webhook data: ' . $connection->error;
    }

    // Close the connection
    $connection->close();
} else {
    echo 'Invalid webhook data.';
}
?>
