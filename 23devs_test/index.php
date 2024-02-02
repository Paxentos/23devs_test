<a href="form_add_message.php">Добавить сообщение</a>
<?php

include_once 'functions.php';

$messages = getMessages();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 2;
$totalMessages = count($messages);
$totalPages = ceil($totalMessages / $perPage);

$start = ($page - 1) * $perPage;
$messages = array_slice($messages, $start, $perPage);


foreach ($messages as $message) {
    ?>
    <div>
        <h2><a href="full_message.php?id=<?= $message['id'] ?>"><?= $message['title']; ?></a></h2>
        <p><?= $message['summary']; ?></p>
    </div>
    <?
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a> ';
}
?>
