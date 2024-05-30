<?php include __DIR__ . '/../includes/header.php'; ?>

<h1>Register</h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="index.php?controller=user&action=register" method="post">
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname'];} ?> ">
    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname'];} ?> ">
    <label for="mail">Mail</label>
    <input type="email" id="mail" name="mail" required value="<?php if(isset($_POST['mail'])) { echo $_POST['mail'];} ?> ">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required value="<?php if(isset($_POST['username'])) { echo $_POST['username'];} ?> ">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <button type="submit">Register</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
