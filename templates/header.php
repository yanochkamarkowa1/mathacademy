<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Юношеская областная физико-математическая школа</title>
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
                <li><a href="index.php" class="selected">Главная</a></li>
                <li><a href="news.php">Новости</a></li>
                <li><a href="timetable.php">Расписание</a></li>
                <li><a href="konkurs.php">Мероприятия</a></li>
                <li><a href="">О школе</a>
                    <ul>
                        <li><a href="contact.php">Контакты</a></li>
                        <li><a href="teacher.php">Преподаватели</a></li>
                        <li><a href="pupil.php">Контингент</a></li>
                        <li><a href="contact_us.php">Связаться с нами</a></li>
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
                    <li class="active"><a href="<?=$link['url']?>"><?=$link['title']?></a></li>
                <?else:?>
                    <li><a href="<?=$link['url']?>"><?=$link['title']?></a></li>
                <?endif?>
            <?endforeach?>
        </ul>
        <div class="main__content">