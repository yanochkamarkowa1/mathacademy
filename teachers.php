<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$userObject = new User();
$teachers = $userObject->getTeachersList();

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/teachers.php');