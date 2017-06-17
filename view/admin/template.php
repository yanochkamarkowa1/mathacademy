<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Администартивная панель</title>
    <link href='/assets/css/admin_style.css' rel='stylesheet' type='text/css'>
    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].$css)):?>
        <link href='<?=$css?>' rel='stylesheet' type='text/css'>
    <? endif ?>
</head>
<main class="main">
    <div class="sidebar">
        <ul>
            <li><a href="/admin/location/">Местоположения</a></li>
            <li><a href="/admin/news/">Новости</a></li>
            <li><a href="/admin/place_work/">Места работы</a></li>
            <li><a href="/admin/student/">Учащиеся</a></li>
            <li><a href="/admin/task/">Задачи</a></li>
            <li><a href="/admin/user/">Пользователи</a></li>
        </ul>
    </div>
    <?= $content ?>
</main>
<footer class="footer">Футер</footer>
<div class="popup">
    <div class="popup__content"></div>
    <div class="popup__close">x</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/admin_script.js"></script>
</html>

