<?
namespace Controller;

/**
 * Отвечает за логику каждой страницы административного раздела
 */
class AdminController
{
    protected $route;
    protected $uploadDir;
    protected $availableExt = [
        'png', 'jpeg', 'bmp', 'gif', 'jpg'
    ];

    public function __construct($route)
    {
        $this->route = $route;
        $this->uploadDir = $_SERVER['DOCUMENT_ROOT'].'/upload/img/';
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

    protected function uploadFoto($file)
    {
        $ext = pathinfo($file['foto']['name'])['extension'];
        if(!in_array($ext, $this->availableExt)) {
            return false;
        }
        $newFileName = uniqid() . '.' . $ext;
        move_uploaded_file($file['foto']['tmp_name'], $this->uploadDir.$newFileName);
        return $newFileName;
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
        $newsList = $newsObject->getNewsList(1, PHP_INT_MAX)['news'];
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

    public function saveNews()
    {
        $id = $_GET['id'];
        $newsObject = new \Model\News();
        $result = $newsObject->saveNews(
            $id,
            $_POST['data'],
            $_POST['name'],
            $_POST['description'],
            $_POST['content'],
            $_POST['foto']
        );
        echo $result;
    }

    public function deleteNews()
    {
        $newsObject = new \Model\News();
        $result = $newsObject->deleteNewsById($_GET['id']);

        echo $result;
    }

    public function showPlaceWork()
    {
        $id = $_GET['id'];
        $placeWorkObject = new \Model\PlaceWork();
        $placeWork = $placeWorkObject->getPlaceWorkById($id);
        $this->renderAjax('show_place_work', ['item' => $placeWork]);
    }

    public function savePlaceWork()
    {
        $placeWorkObject = new \Model\PlaceWork();
        $result = $placeWorkObject->savePlaceWork($_GET['id'], $_POST['name'], $_POST['email'], $_POST['address']);

        echo $result;
    }

    public function deletePlaceWork()
    {
        $newsObject = new \Model\PlaceWork();
        $result = $newsObject->deletePlaceWorkById($_GET['id']);

        echo $result;
    }

    public function showStudent()
    {
        $studentObject = new \Model\Student();
        $student = $studentObject->getStudentById($_GET['id']);
        $this->renderAjax('show_student', ['item' => $student]);
    }

    public function saveStudent()
    {
        $studentObject = new \Model\Student();
        $result = $studentObject->saveStudent(
            $_GET['id'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['patronymic'],
            $_POST['place_work'],
            $_POST['classes'],
            $_POST['location']);

        echo $result;
    }

    public function deleteStudent()
    {
        $studentObject = new \Model\Student();
        $result = $studentObject->deleteStudentById($_GET['id']);

        echo $result;
    }

    public function imagesController()
    {
        $imagesObject = new \Model\Images();
        $result = $imagesObject->getImageList();

        $this->render('images', ['list' => $result]);
    }
}
