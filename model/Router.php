<?
namespace Model;

/**
 * Класс отвечает за определение нужного контроллера
 */
class Router
{
    protected $route;
    protected $param;
    
    public function __construct()
    {
        session_start();
        $url = explode('/', $_GET['route']);
        $this->route = ($url[0]) ?: 'index';
        $this->param = $url[1];
    }
    
    public function start()
    {
        $publicController = new \Controller\PublicController($this->route);
        $adminController = new \Controller\AdminController($this->route);

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
            if($this->param == null) {
                $adminController->indexController();
            } elseif ($this->param == 'location'){
                $adminController->locationController();
            } elseif ($this->param == 'news'){
                $adminController->newsController();
            } elseif ($this->param == 'place_work'){
                $adminController->placeWorkController();
            } elseif ($this->param == 'student'){
                $adminController->studentController();
            } elseif ($this->param == 'task'){
                $adminController->taskController();
            } elseif ($this->param == 'user'){
                $adminController->userController();
            } elseif ($this->param == 'show_location'){
                $adminController->showLocation();
            } elseif ($this->param == 'save_location'){
                $adminController->saveLocation();
            }

        } elseif ($this->route == 'index') {
            $publicController->indexController();
        } else {
            echo 404;
        }
    }
}