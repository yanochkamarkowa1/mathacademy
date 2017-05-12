<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Администартивная панель</title>
    <link href='/assets/css/admin_style.css' rel='stylesheet' type='text/css'>
    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].$css)):?>
        <link href='<?=$css?>' rel='stylesheet' type='text/css'>
    <? endif ?>
</head>
<header class="header">Хедер</header>
<main class="main"><?= $content ?></main>
<footer class="footer">Футер</footer>
</html>

