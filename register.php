<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS -->
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register_action.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="file" name="image" required>
            <textarea name="address" placeholder="Address"></textarea>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
