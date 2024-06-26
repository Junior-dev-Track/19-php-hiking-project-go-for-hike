<?php

use App\Models\Hike;
require_once 'database/Database.php';

class HikeController {
    public function index(): void
    {
        $hikeModel = new Hike();
        $hikes = $hikeModel->getAllHikes(); // Changed variable name to $hikes
        include __DIR__ . '/../views/hikes/list.php';
    }

    public function detail() : void
    {
        $id = $_GET['id'];
        $hike = new Hike();
        $hikeDetail = $hike->getHikeById($id);
        include __DIR__ . '/../views/hikes/detail.php';
    }

    public function create() : void
    {
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
                include __DIR__ . '/../views/hikes/create.php';
            }
        } else {
            include __DIR__ . '/../views/hikes/create.php';
        }
    }

    public function edit() : void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit;
        }

        $id = $_GET['id'];
        $hike = new Hike();
        $hikeDetail = $hike->getHikeById($id);

        if ($_SESSION['user_id'] != $hikeDetail['creatorId']) {
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
                include __DIR__ . '/../views/hikes/edit.php';
            }
        } else {
            include '../views/hikes/edit.php';
        }
    }

    public function delete() : void
    {
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
            include __DIR__ . '/../views/hikes/list.php';
        }
    }
}

