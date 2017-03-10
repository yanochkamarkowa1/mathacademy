<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$result = $pdo->query('SELECT * FROM news');
$news = [];

while ($item = $result->fetch()) {
    $item['data'] = date('d.m.Y', strtotime($item['data']));
    $news[] = $item;
}

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/news.php');