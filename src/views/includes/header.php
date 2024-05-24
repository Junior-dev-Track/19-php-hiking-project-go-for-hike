<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My MVC App</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index.php?controller=hike&action=create">Add Hike</a></li>
                <li><a href="index.php?controller=user&action=logout">Logout</a></li>
            <?php else: ?>
                <li><a href="index.php?controller=user&action=login">Login</a></li>
                <li><a href="index.php?controller=user&action=register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
