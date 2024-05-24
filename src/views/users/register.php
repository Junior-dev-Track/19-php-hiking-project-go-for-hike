<?php include 'views/includes/header.php'; ?>

<h1>Register</h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="index.php?controller=user&action=register" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Register</button>
</form>

<?php include 'views/includes/footer.php'; ?>
