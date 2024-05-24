<?php include 'views/includes/header.php'; ?>

<h1>Edit Hike</h1>
<form action="index.php?controller=hike&action=edit&id=<?= $hikeDetail['id'] ?>" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?= $hikeDetail['name'] ?>" required>
    <label for="description">Description</label>
    <textarea id="description" name="description" required><?= $hikeDetail['description'] ?></textarea>
    <button type="submit">Update</button>
</form>

<?php include 'views/includes/footer.php'; ?>
