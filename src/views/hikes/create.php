<?php include 'views/includes/header.php'; ?>

<h1>Create Hike</h1>
<form action="index.php?controller=hike&action=create" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    <label for="description">Description</label>
    <textarea id="description" name="description" required></textarea>
    <button type="submit">Create</button>
</form>

<?php include 'views/includes/footer.php'; ?>
