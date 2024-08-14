<?php
require('Persistence.php');

$db = new Persistence();

$comment_author = $_POST['comment_author'];
$email = $_POST['email'];
$book_title = $_POST['book'];
$comment = $_POST['comment'];
$comment_post_ID = $_POST['comment_post_ID'];

$db->add_comment([
    'comment_author' => $comment_author,
    'email' => $email,
    'book' => $book_title,  // Add book title to the parameters
    'comment' => $comment,
    'comment_post_ID' => $comment_post_ID
]);

header("Location: /bookworm/review.php");
?>
