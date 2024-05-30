<?php include __DIR__ . '/../includes/header.php'; ?>

<h1>Hikes</h1>
<?php
if (isset($_SESSION['username'])) {
    echo "<p> Bonjour " . $_SESSION['username'] . "</p>";
}
?>
<ul>
    <?php
    foreach ($hikes as $hike){
        echo "<li>";
         echo "<a href='index.php?controller=hike&action=detail&id=" . $hike["id"] . "'>" . $hike["name"] . "</a>";
        echo "</li>";
    }


echo "</ul>";

include __DIR__ . '/../includes/footer.php'; ?>
