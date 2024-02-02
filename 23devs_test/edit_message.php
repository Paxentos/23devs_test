<?php

include_once 'functions.php';

$messageId = isset($_GET['id']) ? $_GET['id'] : null;
if ($messageId) {
    $message = getFullMessages($messageId);
    foreach ($message as $one_message) {
        ?>
        <a href="index.php">На главную</a>
        <form action="" method="POST">
            <p>Заголовок: <input type="text" name="new_title" value="<?= $one_message['title']; ?>"/></p>
            <p>Автор: <input type="text" name="new_author" value="<?= $one_message['author']; ?>"/></p>
            <p>Краткое содержание: <input type="text" name="new_summary" value="<?= $one_message['summary']; ?>"/></p>
            <p>Полное содержание: <input type="text" name="new_full_content"
                                         value="<?= $one_message['full_content']; ?>"/></p>
            <input type="hidden" name="message_id" value="' <?= $messageId ?> '">
            <input type="hidden" name="action" value="editMessage">
            <input type="submit" value="Редактировать">
        </form>
        <?
    }
    ?>
    <?

}
?>

