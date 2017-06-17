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
        session_start();
        $url = explode('/', $_GET['route']);
        $this->route = ($url[0]) ?: 'index';
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
            $adminController->indexController();
			
		} elseif ($this->route == 'student_admin') {
            $adminController->studentController();
			
		} elseif ($this->route == 'feedback_admin') {
            $adminController->feedbackController();
		
		} elseif ($this->route == 'news_admin') {
            $adminController->newsController();
			
		} elseif ($this->route == 'task_admin') {
            $adminController->taskController();
			
		} elseif ($this->route == 'placework_admin') {
            $adminController->place_workController();
		
		} elseif ($this->route == 'teacher_admin') {
            $adminController->teacherController();
		
        } elseif ($this->route == 'index') {
            $publicController->indexController();
        } else {
            echo 404;
        }
    }
}