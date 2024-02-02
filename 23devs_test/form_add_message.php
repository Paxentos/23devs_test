<?php
include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить сообщение</title>
</head>
<body>
<a href="index.php">На главную</a>
<h3>Добавить сообщение</h3>
<form action="" method="POST">
    <p>Заголовок: <input type="text" name="title"/></p>
    <p>Автор: <input type="text" name="author"/></p>
    <p>Краткое содержание: <input type="text" name="summary"/></p>
    <p>Полное содержание: <input type="text" name="full_content"/></p>
    <input type="hidden" name="action" value="addMessage">
    <input type="submit" value="Добавить сообщение">
</form>
</body>
</html>