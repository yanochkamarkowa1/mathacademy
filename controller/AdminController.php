<?
namespace Controller;

/**
 * Отвечает за логику каждой страницы административного раздела
 */
class AdminController
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }
    /**
     * Отображает шаблон страницы с заполненными данными
     * @param string $name имя файла шаблона
     * @param array $args массив данных, передваваемых в шаблон
     */
    protected function render($name, $args = [])
    {
        $css = '/assets/css/'.$this->route.'.css';
        extract($args);
        ob_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/admin/' . $name . '.php');
        $content = ob_get_clean();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/admin/template.php');
    }

    /**
     * Отображает шаблон страницы с заполненными данными
     * @param string $name имя файла шаблона
     * @param array $args массив данных, передваваемых в шаблон
     */
    protected function renderAjax($name, $args = [])
    {
        extract($args);
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/admin/' . $name . '.php');
    }

    public function indexController()
    {
        if($_POST['submit']){
            $userObject = new \Model\User();
            $result = $userObject->checkLogin($_POST['login'], $_POST['password']);
            $_SESSION['admin'] = $result;
        }
        if($_SESSION['admin']){
            $this->render('index');
        } else {
            $this->render('login');
        }
    }

    public function locationController()
    {
        if($_SESSION['admin']){
            $locationObject = new \Model\Location();
            $locationList = $locationObject->getLocationList();
            $this->render('location', ['list' => $locationList]);
        } else {
            $this->render('login');
        }
    }

    public function newsController()
    {
        if($_SESSION['admin']){
            $newsObject = new \Model\News();
            $newsList = $newsObject->getNewsList(1, PHP_INT_MAX);
            $this->render('news', ['list' => $newsList]);
        } else {
            $this->render('login');
        }
    }

    public function placeWorkController()
    {
        if($_SESSION['admin']){
            $placeWorkObject = new \Model\PlaceWork();
            $placeWorkList = $placeWorkObject->getPlaceWorkList();
            $this->render('place_work', ['list' => $placeWorkList]);
        } else {
            $this->render('login');
        }
    }

    public function studentController()
    {
        if($_SESSION['admin']){
            $studentObject = new \Model\Student();
            $studentList = $studentObject->getStudentList();
            $this->render('student', ['list' => $studentList]);
        } else {
            $this->render('login');
        }
    }

    public function taskController()
    {
        if($_SESSION['admin']){
            $taskObject = new \Model\Task();
            $taskList = $taskObject->getTasksList(1, PHP_INT_MAX);
            $this->render('task', ['list' => $taskList]);
        } else {
            $this->render('login');
        }
    }

    public function userController()
    {
        if($_SESSION['admin']){
            $userObject = new \Model\User();
            $userList = $userObject->getUserList();
            $this->render('user', ['list' => $userList]);
        } else {
            $this->render('login');
        }
    }

    public function showLocation()
    {
        $id = $_GET['id'];
        if($_SESSION['admin']){
            $locationObject = new \Model\Location();
            $location = $locationObject->getLocationById($id);
            $this->renderAjax('show_location', ['item' => $location]);
        } else {
            $this->render('login');
        }
    }

    public function saveLocation()
    {
        $locationObject = new \Model\Location();
        $result = $locationObject->saveLocation($_GET['id'], $_POST['name'], $_POST['type']);

        echo $result;
    }
}
