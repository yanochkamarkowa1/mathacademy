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
    protected function render($name, $args = [], $ajax = false)
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

    public function redirectToLogin()
    {
        header( 'Location: /admin/login/');
    }

    protected function redirectToIndex()
    {
        header( 'Location: /admin/');
    }

    public function indexController()
    {
        $this->render('index');
    }

    public function loginController()
    {
        if($_POST['submit']){
            $userObject = new \Model\User();
            $result = $userObject->checkLogin($_POST['login'], $_POST['password']);
            $_SESSION['admin'] = $result;
        }
        if($_SESSION['admin']){
            $this->redirectToIndex();
        }
        $this->renderAjax('login');
    }

    public function locationController()
    {
            $locationObject = new \Model\Location();
            $locationList = $locationObject->getLocationList();
            $this->render('location', ['list' => $locationList]);
    }

    public function newsController()
    {
        $newsObject = new \Model\News();
        $newsList = $newsObject->getNewsList(1, PHP_INT_MAX);
        $this->render('news', ['list' => $newsList]);
    }

    public function placeWorkController()
    {
        $placeWorkObject = new \Model\PlaceWork();
        $placeWorkList = $placeWorkObject->getPlaceWorkList();
        $this->render('place_work', ['list' => $placeWorkList]);
    }

    public function studentController()
    {
        $studentObject = new \Model\Student();
        $studentList = $studentObject->getStudentList();
        $this->render('student', ['list' => $studentList]);
    }

    public function taskController()
    {
        $taskObject = new \Model\Task();
        $taskList = $taskObject->getTasksList(1, PHP_INT_MAX);
        $this->render('task', ['list' => $taskList]);
    }

    public function userController()
    {
        $userObject = new \Model\User();
        $userList = $userObject->getUserList();
        $this->render('user', ['list' => $userList]);
    }

    public function showLocation()
    {
        $id = $_GET['id'];
        $locationObject = new \Model\Location();
        $location = $locationObject->getLocationById($id);
        $this->renderAjax('show_location', ['item' => $location]);
    }

    public function saveLocation()
    {
        $locationObject = new \Model\Location();
        $result = $locationObject->saveLocation($_GET['id'], $_POST['name'], $_POST['type']);

        echo $result;
    }

    public function deleteLocation()
    {
        $locationObject = new \Model\Location();
        $result = $locationObject->deleteLocationById($_GET['id']);

        echo $result;
    }

    public function showNews()
    {
        $id = $_GET['id'];
        $newsObject = new \Model\News();
        $news = $newsObject->getNewsById($id);
        $this->renderAjax('show_news', ['item' => $news]);
    }
}
