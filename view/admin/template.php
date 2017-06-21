<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Администартивная панель</title>
    <link href='/assets/css/admin_style.css' rel='stylesheet' type='text/css'>
    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].$css)):?>
        <link href='<?=$css?>' rel='stylesheet' type='text/css'>
    <? endif ?>
</head>
<div class="sidebar">
    <ul>
        <li><a href="/admin/">Главная</a></li>
        <li><a href="/">Вернуться на сайт</a></li>
    </ul>
    <ul>
        <?if($_SESSION['admin']['rights'] == 1):?>
            <li><a href="/admin/location/">Местоположения</a></li>
            <li><a href="/admin/news/">Новости</a></li>
            <li><a href="/admin/place_work/">Места работы</a></li>
            <li><a href="/admin/user/">Пользователи</a></li>
        <?endif;?>
        <li><a href="/admin/student/">Учащиеся</a></li>
        <li><a href="/admin/task/">Задачи</a></li>
        <li><a href="/admin/images/">Изображения</a></li>
    </ul>
    <?if($_SESSION['admin']['rights'] == 1):?>
        <ul>
            <li><a href="/admin/feedback/">Обратная связь</a></li>
            <li><a href="/admin/associate/">Связанные сущности</a></li>
        </ul>
    <?endif;?>
</div>
<main class="main">
    <header class="header">Вы зашли под логином <?=$_SESSION['admin']['login']?>. <a href="/admin/logout/">Выйти</a></header>
    <?= $content ?>
</main>
<footer class="footer">Академия занимательной математики. <?=date('Y')?></footer>
<div class="popup">
    <div class="popup__content"></div>
    <div class="popup__close">x</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/admin_script.js"></script>
</html>

