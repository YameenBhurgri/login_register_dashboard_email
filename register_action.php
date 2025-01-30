<?php
include 'db.php'; // Database connection

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $address = $_POST['address'];

    // Handle Image Upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert into Database
    $query = "INSERT INTO users (name, email, password, phone, description, image, address) 
              VALUES ('$name', '$email', '$password', '$phone', '$description', '$image', '$address')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php"); // Redirect to login page
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
