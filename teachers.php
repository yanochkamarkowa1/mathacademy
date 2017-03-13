<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

$userObject = new User();
$teachers = $userObject->getTeachersList();
print_r($teachers);

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/teachers.php');