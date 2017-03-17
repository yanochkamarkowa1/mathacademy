<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$page = $_GET['page'] ?: 1;
$newsObject = new News();
$news = $newsObject->getNewsList($page);
$pagination = $newsObject->getPagination();

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/news.php');