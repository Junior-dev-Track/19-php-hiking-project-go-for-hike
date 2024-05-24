<?php
class Hike {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllHikes() {
        $stmt = $this->db->prepare("SELECT * FROM hikes");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getHikeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM hikes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createHike($name, $description, $userId) {
        $stmt = $this->db->prepare("INSERT INTO hikes (name, description, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $description, $userId);
        return $stmt->execute();
    }

    public function updateHike($id, $name, $description, $userId) {
        $stmt = $this->db->prepare("UPDATE hikes SET name = ?, description = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ssii", $name, $description, $id, $userId);
        return $stmt->execute();
    }

    public function deleteHike($id, $userId) {
        $stmt = $this->db->prepare("DELETE FROM hikes WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $userId);
        return $stmt->execute();
    }
}
?>
