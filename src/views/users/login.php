<?php include __DIR__ . '/../includes/header.php'; ?>

<h1>Login</h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="index.php?controller=user&action=login" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
