<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$newsObject = new News();
$newsDetail = $newsObject->getNewsById($_GET['id']);

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/news_detail.php');