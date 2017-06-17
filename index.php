<?
/* Подключение сторонних библиотек не на классах*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmathpublisher/mathpublisher.php');
error_reporting(0);
/**
 * Функция, позволяющая подключать только вызываемые в коде классы<br><br>
 * Например, при вызове:<br>
 * <b>new \Model\News()</b> подключит файл /model/News.php<br>
 * <b>new \Controller\PublicController()</b> подключит файл /controller/PublicController.php<br><br>
 * Если файл не найден, попытается найти его в папке vendor, например:<br>
 * <b>new \ReCaptcha()</b> подключит файл /vendor/ReCaptcha.php
 * @param string $className
 */
function __autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', '/', $namespace) . '/';
    }
    $fileNameVendor = $_SERVER['DOCUMENT_ROOT'].'/'.strtolower($fileName).'vendor/'.$className.'.php';
    $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.strtolower($fileName).$className.'.php';
    if (file_exists($fileName)) {
        require_once($fileName);
    } elseif (file_exists($fileNameVendor)){
        require_once($fileNameVendor);
    } else {
        die('Класс ' . $className . ' не найден');
    }
}

/* Вызывает необходимый для данной страницы контроллер */
(new \Model\Router())->start();
