<?php

namespace App\Models;

use App\Database\Database;
use Exception;
use PDO;

class Hike {
    private bool|PDO $db;

    public function __construct() {
        $msg = "Hike model";
        $this->db = Database::connect($msg);

        if ($this->db === false) {
            // Handle the error, e.g. throw an exception
            throw new Exception('Failed to connect to the database');
        }
    }

    public function getAllHikes() {
        $stmt = $this->db->prepare("SELECT * FROM hikes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHikeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM hikes WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createHike($name, $description, $userId) {
        $stmt = $this->db->prepare("INSERT INTO hikes (name, description, creatorId) VALUES (?, ?, ?)");
        $stmt->bindParam("ssi", $name, $description, $userId);
        return $stmt->execute();
    }

    public function updateHike($id, $name, $description, $userId) {
        $stmt = $this->db->prepare("UPDATE hikes SET name = ?, description = ? WHERE id = ? AND creatorId = ?");
        $stmt->bindParam("ssii", $name, $description, $id, $userId);
        return $stmt->execute();
    }

    public function deleteHike($id, $userId) {
        $stmt = $this->db->prepare("DELETE FROM hikes WHERE id = ? AND creatorId = ?");
        $stmt->bindParam("ii", $id, $userId);
        return $stmt->execute();
    }
}
?>
