<?php
/** @var app\Views\View $this */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=$this->getStyle() ?>">
    <title><?=$this->getTitle() ?></title>
</head>
<body>
    <ul algin="center">
        <li><a href="/">Загрузчик</a></li>
        <li><a href="/table">Данные</a></li>
    </ul>
    <?php include $this->getView().'.php' ?>
</body>
</html>