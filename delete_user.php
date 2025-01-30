<?php
session_start();
include 'db.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
}

// Get the user ID from the URL
$user_id = $_GET['id'];

// Delete the user from the database
$query = "DELETE FROM users WHERE id='$user_id'";
mysqli_query($conn, $query);

// Redirect back to the view users page
header("Location: view_users.php");
exit();
?>
