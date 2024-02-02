<?php


include_once 'functions.php';
?><a href="index.php">На главную</a> <?php
$messageId = isset($_GET['id']) ? $_GET['id'] : null;
if ($messageId) {
    $message = getFullMessages($messageId);
    foreach ($message as $one_message) {
        ?>
        <div>
            <h2><?= $one_message['title']; ?></h2>
            <p><?= $one_message['full_content']; ?></p>
        </div>
        <?
    }
    ?>
    <div>
        <a href="edit_message.php?id=<?= $messageId ?>">Редактировать сообщение</a>
    </div>
    <?

    $comments = getCommentsByMessageId($messageId);

    echo '<h2>' . $message['title'] . '</h2>';
    echo '<p>' . $message['full_content'] . '</p>';

    echo '<h3>Комментарии</h3>';
    foreach ($comments as $comment) {
        echo '<p><strong>' . $comment['author'] . ':</strong></p>';
        echo '<p>' . $comment['comments'] . '</p>';
    }

    echo '<form method="post" action="">';
    echo '<input type="hidden" name="message_id" value="' . $messageId . '">';
    echo '<label>Ваше имя: <input type="text" name="author_comments"></label><br>';
    echo '<br><label>Комментарий: <textarea name="content"></textarea></label><br>';
    echo '<input type="hidden" name="action" value="addComment">';
    echo '<br><input type="submit" value="Добавить комментарий">';
    echo '</form>';
}

