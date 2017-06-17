<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Администартивная панель</title>
    <link href='/assets/css/admin_style.css' rel='stylesheet' type='text/css'>
    <link href='/assets/css/ddsmoothmenu.css' rel='stylesheet' type='text/css'>
	<link href='/assets/css/feedback_admin.css' rel='stylesheet' type='text/css'>
	<link href='/assets/css/news_admin.css' rel='stylesheet' type='text/css'>
	<link href='/assets/css/task_admin.css' rel='stylesheet' type='text/css'>
	
</head>
<div id="wrapper">
    <div id="header">
        <div id="site_title"><h1><a href="index.php"></a></h1></div>
        <a href="http://tsput.ru" target="_blank"><img src="/assets/img/tgpu.png" class="header__logo" alt="logo"/></a>
        <div id="menu" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php">Обратная связь</a></li>
                <li><a href="news.php">Изменение новостей</a></li>
                <li><a href="timetable.php">Изменение учеников</a></li>
                <li><a href="konkurs.php">Изменение преподавателей</a></li>
            </ul>
            <br style="clear: left"/></div>
        <div class="cleaner"></div>
    </div>
</div>
<main class="main"><?= $content ?></main>
</html>

