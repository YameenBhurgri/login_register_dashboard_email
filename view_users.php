<?php
session_start();
include 'db.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
}

// Fetch all users data
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS -->
</head>
<body>
    <div class="container">
        <h2>All Users</h2>
        <div class="users-cart">
            <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                <div class="card">
                    <img src="uploads/<?php echo $user['image']; ?>" alt="Profile Image">
                    <p>Name: <?php echo $user['name']; ?></p>
                    <p>Email: <?php echo $user['email']; ?></p>
                    <p>Phone: <?php echo $user['phone']; ?></p>
                    <p>Description: <?php echo $user['description']; ?></p>
                    <p>Address: <?php echo $user['address']; ?></p>
                    <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <a style="background-color: red;" href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
