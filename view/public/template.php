<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Академия занимательной математики | <?= $title ?></title>
    <link href='/assets/css/style.css' rel='stylesheet' type='text/css'>
    <? if(file_exists($_SERVER['DOCUMENT_ROOT'].$css)):?>
        <link href='<?=$css?>' rel='stylesheet' type='text/css'>
    <? endif ?>
    <link rel="stylesheet" type="text/css" href="/assets/css/ddsmoothmenu.css"/>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="site_title"><h1><a href="http://fmsh.tsput.ru/index.php"></a></h1></div>
        <a href="http://tsput.ru" target="_blank"><img src="/assets/img/tgpu.png" class="header__logo" alt="logo"/></a>
        <div id="menu" class="ddsmoothmenu">
            <ul>
                <li><a href="http://fmsh.tsput.ru/index.php">Главная</a></li>
                <li><a href="http://fmsh.tsput.ru/news.php">Новости</a></li>
                <li><a href="http://fmsh.tsput.ru/timetable.php">Расписание</a></li>
                <li><a href="http://fmsh.tsput.ru/konkurs.php">Мероприятия</a></li>
                <li><a href="">О школе</a>
                    <ul>
                        <li><a href="http://fmsh.tsput.ru/contact.php">Контакты</a></li>
                        <li><a href="http://fmsh.tsput.ru/teacher.php">Преподаватели</a></li>
                        <li><a href="http://fmsh.tsput.ru/pupil.php">Контингент</a></li>
                        <li><a href="http://fmsh.tsput.ru/contact_us.php">Связаться с нами</a></li>
                    </ul>
                </li>
            </ul>
            <br style="clear: left"/></div>
        <div class="cleaner"></div>
    </div>
</div>
<div class="cloud--top"></div>
<div id="main">
    <div id="main__wrapper">
        <h3 class="children-title">Академия занимательной математики</h3>
        <ul class="children-menu">
            <? foreach ($menu as $link): ?>
                <? if ($link['is_active']): ?>
                    <li class="active"><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                <? else: ?>
                    <li><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                <? endif ?>
                <? if (is_array($link['children'])): ?>
                    <ul class="children-menu__child">
                        <? foreach ($link['children'] as $child): ?>
                            <li><a href="<?= $child['url'] ?>"><?= $child['title'] ?></a></li>
                        <? endforeach ?>
                    </ul>
                <? endif; ?>
                </li>
            <? endforeach ?>
        </ul>
        <div class="main__content">
            <?= $content ?>
        </div>
    </div>
</div>
<div id="footer_wrapper">
    <div id="footer">
        Copyright &copy; <?=date('Y')?>
        <div class="cleaner"></div>
    </div>
    <div id="qoo-counter">
        <div>
            <img src="http://qooi.ru/counter/standard/004.png" alt="Счетчик посещаемости и статистика сайта">
            <div id="qoo-counter-visits"></div>
            <div id="qoo-counter-views"></div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="http://qoo.by/counter.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="/assets/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="/assets/js/script.js"></script>
</body>
</html>
