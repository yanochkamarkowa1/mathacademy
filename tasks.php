<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$page = $_GET['page'] ?: 1;
$category = $_GET['category'] ?: null;
$taskObject = new Task();
$tasks = $taskObject->getTasksList(1, 10, $category);
$pagination = $taskObject->getPagination();
$categoryName = $taskObject->getCurrentCategory();

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/tasks.php');