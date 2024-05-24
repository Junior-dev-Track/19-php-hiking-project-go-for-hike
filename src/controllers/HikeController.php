<?php

require_once 'models/Hike.php';
require_once 'database/Database.php';

class HikeController {
    public function index() {
        $hike = new Hike();
        $hikes = $hike->getAllHikes();
        include 'views/hikes/list.php';
    }

    public function detail() {
        $id = $_GET['id'];
        $hike = new Hike();
        $hikeDetail = $hike->getHikeById($id);
        include 'views/hikes/detail.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $userId = $_SESSION['user_id'];

            $hike = new Hike();
            if ($hike->createHike($name, $description, $userId)) {
                header('Location: index.php');
            } else {
                $error = "Failed to create hike.";
                include 'views/hikes/create.php';
            }
        } else {
            include 'views/hikes/create.php';
        }
    }

    public function edit() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit;
        }

        $id = $_GET['id'];
        $hike = new Hike();
        $hikeDetail = $hike->getHikeById($id);

        if ($_SESSION['user_id'] != $hikeDetail['user_id']) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $userId = $_SESSION['user_id'];

            if ($hike->updateHike($id, $name, $description, $userId)) {
                header('Location: index.php');
            } else {
                $error = "Failed to update hike.";
                include 'views/hikes/edit.php';
            }
        } else {
            include 'views/hikes/edit.php';
        }
    }

    public function delete() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit;
        }

        $id = $_GET['id'];
        $userId = $_SESSION['user_id'];

        $hike = new Hike();
        if ($hike->deleteHike($id, $userId)) {
            header('Location: index.php');
        } else {
            $error = "Failed to delete hike.";
            include 'views/hikes/list.php';
        }
    }
}
?>