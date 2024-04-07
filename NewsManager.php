<?php

// NewsManager class
class NewsManager {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function getNews() {
        $sql = "SELECT * FROM news";
        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'News');
        return $results;
    }

    public function getNewsById($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->query($sql, $params);
        $result = $stmt->fetchObject('News');
        return $result;
    }

    public function addNews(string $title, string $body) {
        $createdAt = date('Y-m-d H:i:s');
        $sql = "INSERT INTO news (title, body, created_at) VALUES (:title, :body, :created_at)";
        $params = [
            ':title' => $title,
            ':body' => $body,
            ':created_at' => $createdAt,
        ];
        $this->db->query($sql, $params);
    }
}