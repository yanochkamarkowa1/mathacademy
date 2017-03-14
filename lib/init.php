<?
/* Подключение сторонних библиотек */
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/vendor/phpmathpublisher/mathpublisher.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/vendor/recaptchalib.php');

/* Подключение классов */
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/DbConfig.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/News.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/Menu.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/Task.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/User.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/classes/Feedback.php');

/* Подключение остальной логики, необходимой для всего сайта */
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/common.php');