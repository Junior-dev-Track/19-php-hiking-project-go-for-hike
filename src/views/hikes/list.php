<?php include 'views/includes/header.php'; ?>

<h1>Hikes</h1>
<ul>
    <?php foreach ($hikes as $hike): ?>
        <li>
            <a href="index.php?controller=hike&action=detail&id=<?= $hike['id'] ?>"><?= $hike['name'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'views/includes/footer.php'; ?>
