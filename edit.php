<?php
session_start();
include 'db.php'; // Database connection

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="update_action.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
            <textarea name="description"><?php echo $user['description']; ?></textarea>
            <input type="file" name="image">
            <textarea name="address"><?php echo $user['address']; ?></textarea>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
