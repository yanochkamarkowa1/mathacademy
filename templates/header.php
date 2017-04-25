<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Академия занимательной математики | <?=$title?></title>
    <link href='../css/style.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css"/>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="site_title"><h1><a href="index.php"></a></h1></div>
        <a href="http://tsput.ru" target="_blank"><img src="../img/tgpu.png" class="header__logo" alt="logo"/></a>
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
            <?foreach ($menu as $link):?>
                <?if($link['is_active']):?>
                    <li class="active"><a href="<?=$link['url']?>"><?=$link['title']?></a>
                <?else:?>
                    <li><a href="<?=$link['url']?>"><?=$link['title']?></a>
                <?endif?>
                <?if(is_array($link['children'])):?>
                    <ul class="children-menu__child">
                    <?foreach($link['children'] as $child):?>
                        <li><a href="<?=$child['url']?>"><?=$child['title']?></a></li>
                    <?endforeach?>
                    </ul>
                <?endif;?>
                </li>
            <?endforeach?>
        </ul>
        <div class="main__content">