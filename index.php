<?php

require_once 'newsmanager.php';
require_once 'commentmanager.php';
require_once 'news.php';
require_once 'comment.php';

$newsManager = new NewsManager();
$commentManager = new CommentManager();

// Get all news
$news = $newsManager->getNews();
foreach ($news as $new) {
    echo "News title: " . $new->getTitle() . PHP_EOL;
    echo "News body: " . $new->getBody() . PHP_EOL;
    echo "News created at: " . $new->getCreatedAt()->format('Y-m-d H:i:s') . PHP_EOL;

    // Get comments by news id
    $comments = $commentManager->getCommentsByNewsId($new->getId());
    foreach ($comments as $comment) {
        echo "Comment body: " . $comment->getBody() . PHP_EOL;
        echo "Comment created at: " . $comment->getCreatedAt()->format('Y-m-d H:i:s') . PHP_EOL;
    }
    echo PHP_EOL;
}

// Add new news
$newsManager->addNews('New News Title', 'This is the new news body.');