<?php

// functions.php

include_once 'config_db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'addMessage') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $summary = $_POST['summary'];
            $fullContent = $_POST['full_content'];

            addMessages($title, $author, $summary, $fullContent);
        }
        if ($action === 'editMessage') {
            $message_id = $_POST['message_id'];
            $new_title = $_POST['new_title'];
            $new_author = $_POST['new_author'];
            $new_summary = $_POST['new_summary'];
            $new_fullContent = $_POST['new_full_content'];

            editMessage($message_id, $new_title, $new_author, $new_summary, $new_fullContent);

        } elseif ($action === 'addComment') {
            $message_id = $_POST['message_id'];
            $comments = $_POST['content'];
            $author_comments = $_POST['author_comments'];

            addComments($message_id, $comments, $author_comments);
        }
    }
}
function getMessages()
{
    global $pdo;

    $request = $pdo->prepare("SELECT * FROM message");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getFullMessages($id_message)
{
    global $pdo;

    $request = $pdo->prepare("SELECT * FROM message WHERE id = $id_message");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function addMessages($title, $author, $summary, $full_content)
{
    global $pdo;
    if (empty($title) || empty($author) || empty($summary) || empty($full_content) )
    {
        echo "Пожалуйста, заполните все поля.";
        return;
    }
    $request = $pdo->prepare("INSERT INTO message (title, author, summary, full_content) VALUES ('$title', '$author', '$summary', '$full_content');");
    $request->execute();
}

function getCommentsByMessageId($message_id)
{
    global $pdo;

    $request = $pdo->prepare("SELECT * FROM comments WHERE id_message = $message_id");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function addComments($message_id, $comments, $author_comments)
{
    global $pdo;
    if (empty($comments) || empty($author_comments))
    {
        echo "Пожалуйста, заполните все поля.";
        return;
    }
    $request = $pdo->prepare("INSERT INTO comments (id_message, comments , author) VALUES ('$message_id', '$comments' , '$author_comments');");
    $request->execute();
}

function editMessage($message_id, $title, $author, $summary, $full_content)
{
    global $pdo;
    $request = $pdo->prepare("UPDATE message SET title = '$title',author = '$author', summary = '$summary', full_content = '$full_content'  WHERE id = $message_id");
    $request->execute();

}


