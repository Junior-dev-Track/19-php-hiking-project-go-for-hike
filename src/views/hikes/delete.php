<?php include 'views/includes/header.php'; ?>
//
 <h1>Delete Hike</h1>
 <p>Are you sure you want to delete this hike?</p>
 <form action="index.php?controller=hike&action=delete&id=<?= $hikeDetail['id'] ?>" method="post">
     <button type="submit">Delete</button>
 </form>
//
 <?php include 'views/includes/footer.php'; ?>