<?php
session_start();
include 'db.php'; // Database connection

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS -->
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $user['name']; ?>!</h2>
        <div class="card" style="width: 50%; margin: auto;">
            <img src="uploads/<?php echo $user['image']; ?>" alt="Profile Image">
            <p>Name: <?php echo $user['name']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Phone: <?php echo $user['phone']; ?></p>
            <p>Description: <?php echo $user['description']; ?></p>
            <p>Address: <?php echo $user['address']; ?></p>
            <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
            
            <!-- View Users Button -->
            <a href="view_users.php" class="view-users-btn" style="background-color: blue;">View All Users</a>
            
            <!-- Logout Button -->
            <a href="logout.php" class="logout-btn" style="background-color: red;">Logout</a>
        </div>
    </div>
</body>
</html>
