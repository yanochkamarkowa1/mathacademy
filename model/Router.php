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
            if($_SESSION['admin']) {
                if ($this->param == null) {
                    $adminController->indexController();
                } elseif ($this->param == 'logout') {
                    $adminController->logoutController();
                } elseif ($this->param == 'location') {
                    $adminController->locationController();
                } elseif ($this->param == 'news') {
                    $adminController->newsController();
                } elseif ($this->param == 'place_work') {
                    $adminController->placeWorkController();
                } elseif ($this->param == 'student') {
                    $adminController->studentController();
                } elseif ($this->param == 'task') {
                    $adminController->taskController();
                } elseif ($this->param == 'user') {
                    $adminController->userController();
                } elseif ($this->param == 'images') {
                    $adminController->imagesController();
                } elseif ($this->param == 'show_location') {
                    $adminController->showLocation();
                } elseif ($this->param == 'save_location') {
                    $adminController->saveLocation();
                } elseif ($this->param == 'add_location') {
                    $adminController->addLocation();
                } elseif ($this->param == 'add_location') {
                    $adminController->addLocation();
                }  elseif ($this->param == 'delete_location') {
                    $adminController->deleteLocation();
                } elseif ($this->param == 'show_news') {
                    $adminController->showNews();
                } elseif ($this->param == 'save_news') {
                    $adminController->saveNews();
                } elseif ($this->param == 'add_news') {
                    $adminController->addNews();
                } elseif ($this->param == 'delete_news') {
                    $adminController->deleteNews();
                } elseif ($this->param == 'show_place_work') {
                    $adminController->showPlaceWork();
                } elseif ($this->param == 'save_place_work') {
                    $adminController->savePlaceWork();
                } elseif ($this->param == 'add_place_work') {
                    $adminController->addPlaceWork();
                } elseif ($this->param == 'delete_place_work') {
                    $adminController->deletePlaceWork();
                } elseif ($this->param == 'show_student') {
                    $adminController->showStudent();
                } elseif ($this->param == 'save_student') {
                    $adminController->saveStudent();
                } elseif ($this->param == 'add_student') {
                    $adminController->addStudent();
                } elseif ($this->param == 'delete_student') {
                    $adminController->deleteStudent();
                } elseif ($this->param == 'show_task') {
                    $adminController->showTask();
                } elseif ($this->param == 'save_task') {
                    $adminController->saveTask();
                } elseif ($this->param == 'add_task') {
                    $adminController->addTask();
                } elseif ($this->param == 'delete_task') {
                    $adminController->deleteTask();
                } elseif ($this->param == 'show_user') {
                    $adminController->showUser();
                } elseif ($this->param == 'save_user') {
                    $adminController->saveUser();
                } elseif ($this->param == 'add_user') {
                    $adminController->addUser();
                } elseif ($this->param == 'delete_user') {
                    $adminController->deleteUser();
                } elseif ($this->param == 'show_image') {
                    $adminController->showImage();
                } elseif ($this->param == 'add_image') {
                    $adminController->addImage();
                } elseif ($this->param == 'delete_image') {
                    $adminController->deleteImage();
                } elseif ($this->param == 'feedback') {
                    $adminController->feedbackController();
                } elseif ($this->param == 'delete_feedback') {
                    $adminController->deleteFeedback();
                } elseif ($this->param == 'associate') {
                    $adminController->associatedController();
                } else {
                    echo 404;
                }
            } else {
                if($this->param == 'login') {
                    $adminController->loginController();
                } else {
                    $adminController->redirectToLogin();
                }
            }

        } elseif ($this->route == 'index') {
            $publicController->indexController();
        } else {
            echo 404;
        }
    }
}