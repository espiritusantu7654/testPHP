<?php

// CommentManager class
class CommentManager {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function getCommentsByNewsId($news_id) {
        $sql = "SELECT * FROM comment WHERE news_id = :news_id";
        $params = [':news_id' => $news_id];
        $stmt = $this->db->query($sql, $params);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $results;
    }

    public function addComment(string $body, int $newsId) {
        $createdAt = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comment (body, created_at, news_id) VALUES (:body, :created_at, :news_id)";
        $params = [
            ':body' => $body,
            ':created_at' => $createdAt,
            ':news_id' => $newsId,
        ];
        $this->db->query($sql, $params);
    }
}