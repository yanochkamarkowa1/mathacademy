<?
namespace Model;

/**
 * Класс отвечает за определение нужного контроллера
 */
class Router
{
    protected $route;
    
    public function __construct()
    {
        $url = explode('/', $_GET['route']);
        $this->route = ($url[0]) ?: 'index';
    }
    
    public function start()
    {
        $publicController = new \Controller\PublicController($this->route);
        $adminController = new \Controller\AdminController();

        if($this->route == 'news'){
            $publicController->newsController();

        } elseif ($this->route == 'news_detail') {
            $publicController->newsDetailController();

        } elseif ($this->route == 'tasks') {
            $publicController->tasksController();

        } elseif ($this->route == 'play') {
            $publicController->playController();

        } elseif ($this->route == 'teachers') {
            $publicController->teachersController();

        } elseif ($this->route == 'feedback') {
            $publicController->feedbackController();

        } elseif ($this->route == 'admin') {
            $adminController->indexController();

        } elseif ($this->route == 'index') {
            $publicController->indexController();
        } else {
            echo 404;
        }
    }
}