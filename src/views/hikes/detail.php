<?php include 'views/includes/header.php'; ?>

<h1><?= $hikeDetail['name'] ?></h1>
<p><?= $hikeDetail['description'] ?></p>

<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $hikeDetail['user_id']): ?>
    <a href="index.php?controller=hike&action=edit&id=<?= $hikeDetail['id'] ?>">Edit</a>
    <a href="index.php?controller=hike&action=delete&id=<?= $hikeDetail['id'] ?>">Delete</a>
<?php endif; ?>

<?php include 'views/includes/footer.php'; ?>
