<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$newsObject = new News();
$news = $newsObject->getNewsList(1, 5);

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/index.php');
