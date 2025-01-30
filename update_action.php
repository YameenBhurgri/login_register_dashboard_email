<?php
session_start();
include 'db.php'; // Database connection

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $address = $_POST['address'];

    // Handle Image Upload
    $image = $_FILES['image']['name'];
    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image_query = ", image='$image'";
    } else {
        $image_query = "";
    }

    $query = "UPDATE users SET name='$name', email='$email', phone='$phone', description='$description', address='$address' $image_query WHERE id='$_SESSION[user_id]'";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php"); // Redirect to dashboard after update
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
