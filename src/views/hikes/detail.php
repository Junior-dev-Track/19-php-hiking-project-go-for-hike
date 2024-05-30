<?php include __DIR__ . '/../includes/header.php'; ?>

<h1><?= $hikeDetail['name'] ?></h1>
<p><?= $hikeDetail['description'] ?></p>
<p><?= $hikeDetail['location']?> </p>

<?php
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $hikeDetail['creatorId']): ?>
    <a href="index.php?controller=hike&action=edit&id=<?= $hikeDetail['creatorId'] ?>">Edit</a>
    <a href="index.php?controller=hike&action=delete&id=<?= $hikeDetail['creatorId'] ?>">Delete</a>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
