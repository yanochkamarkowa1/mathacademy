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

    public function logoutController()
    {
        unset($_SESSION['admin']);
        $this->redirectToLogin();
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

    public function imagesController()
    {
        $imagesObject = new \Model\Images();
        $result = $imagesObject->getImageList();

        $this->render('images', ['list' => $result]);
    }

    public function showLocation()
    {
        $id = $_GET['id'];
        $locationObject = new \Model\Location();
        $location = [];
        if(isset($id)){
            $location = $locationObject->getLocationById($id);
        }
        $types = $locationObject->getTypeList();
        $this->renderAjax('show_location', ['item' => ['location' => $location, 'types' => $types]]);
    }

    public function saveLocation()
    {
        $locationObject = new \Model\Location();
        $result = $locationObject->saveLocation($_GET['id'], $_POST['name'], $_POST['type']);

        echo $result;
    }

    public function addLocation()
    {
        $locationObject = new \Model\Location();
        $result = $locationObject->addLocation($_POST['name'], $_POST['type']);

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
        $news = [];
        if(isset($id)){
            $newsObject = new \Model\News();
            $news = $newsObject->getNewsById($id);
        }
        $imageObject = new \Model\Images();
        $images = $imageObject->getImageList();
        $this->renderAjax('show_news', ['item' => ['news' => $news, 'images' => $images]]);
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

    public function addNews()
    {
        $newsObject = new \Model\News();
        $result = $newsObject->addNews(
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
        $placeWork = [];
        if(isset($id)){
            $placeWorkObject = new \Model\PlaceWork();
            $placeWork = $placeWorkObject->getPlaceWorkById($id);
        }
        $this->renderAjax('show_place_work', ['item' => $placeWork]);
    }

    public function savePlaceWork()
    {
        $placeWorkObject = new \Model\PlaceWork();
        $result = $placeWorkObject->savePlaceWork($_GET['id'], $_POST['name'], $_POST['email'], $_POST['address']);

        echo $result;
    }

    public function addPlaceWork()
    {
        $placeWorkObject = new \Model\PlaceWork();
        $result = $placeWorkObject->addPlaceWork($_POST['name'], $_POST['email'], $_POST['address']);

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
        $id = $_GET['id'];
        $studentObject = new \Model\Student();
        $student = [];
        if(isset($id)){
            $student = $studentObject->getStudentById($id);
        }
        $classes = $studentObject->getClassesList();
        $placeWork = (new \Model\PlaceWork())->getPlaceWorkList();
        $location = (new \Model\Location())->getLocationList();

        $this->renderAjax('show_student', ['item' => [
            'student' => $student,
            'place_work' => $placeWork,
            'location' => $location,
            'classes' => $classes
        ]]);
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

    public function addStudent()
    {
        $studentObject = new \Model\Student();
        $result = $studentObject->addStudent(
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

    public function showImage()
    {
        $this->renderAjax('show_image');
    }

    public function addImage()
    {
        $imageObject = new \Model\Images();

        if($_FILES['foto']['error'] != 0){
            echo false;
            return;
        }
        $result = $this->uploadFoto($_FILES);
        if($result == false) {
            echo false;
            return;
        }
        $foto = $result;
        $imageObject->addImage($_POST['name'], $foto);

        echo true;
    }

    public function deleteImage()
    {
        $name = $_GET['name'];
        $imagesObject = new \Model\Images();
        $result = $imagesObject->deleteImageByName($name);

        echo $result;
    }

    public function showTask()
    {
        $id = $_GET['id'];
        $taskObject = new \Model\Task();
        $task = [];
        if(isset($id)){
            $task = $taskObject->getTaskById($id);
        }
        $categories = $taskObject->getCategoryList();
        $this->renderAjax('show_task', ['item' => [
            'task' => $task,
            'categories' => $categories
        ]]);
    }

    public function saveTask()
    {
        $taskObject = new \Model\Task();
        $result = $taskObject->saveTask(
            $_GET['id'],
            $_POST['name'],
            $_POST['category'],
            $_POST['content'],
            $_POST['solution']
        );

        echo $result;
    }

    public function addTask()
    {
        $taskObject = new \Model\Task();
        $result = $taskObject->addTask(
            $_POST['name'],
            $_POST['category'],
            $_POST['content'],
            $_POST['solution']
        );

        echo $result;
    }

    public function deleteTask()
    {
        $taskObject = new \Model\Task();
        $result = $taskObject->deleteTaskById($_GET['id']);

        echo $result;
    }

    public function showUser()
    {
        $login = $_GET['login'];
        $userObject = new \Model\User();
        $user = [];
        if(isset($login)){
            $user = $userObject->getUserByLogin($login);
        }
        $privilege = $userObject->getPrivilegeList();
        $position = $userObject->getPositionList();
        $placeWork = (new \Model\PlaceWork())->getPlaceWorkList();
        $location = (new \Model\Location())->getLocationList();
        $images = (new \Model\Images())->getImageList();
        $this->renderAjax('show_user', ['item' => [
            'user' => $user,
            'privilege' => $privilege,
            'place_work' => $placeWork,
            'location' => $location,
            'position' => $position,
            'images' => $images
        ]]);
    }

    public function saveUser()
    {
        $userObject = new \Model\User();
        $result = $userObject->saveUser(
            $_GET['login'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['patronymic'],
            $_POST['email'],
            $_POST['privilege'],
            $_POST['place_work'],
            $_POST['location'],
            $_POST['position'],
            $_POST['foto'],
            $_POST['password']
        );

        echo $result;
    }

    public function addUser()
    {
        $userObject = new \Model\User();
        $result = $userObject->addUser(
            $_POST['login'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['patronymic'],
            $_POST['email'],
            $_POST['privilege'],
            $_POST['place_work'],
            $_POST['location'],
            $_POST['position'],
            $_POST['foto'],
            $_POST['password']
        );

        echo $result;
    }

    public function deleteUser()
    {
        $userObject = new \Model\User();
        $result = $userObject->deleteUserByLogin($_GET['login']);

        echo $result;
    }

    public function feedbackController()
    {
        $feedbackObject = new \Model\Feedback();
        $feedbacks = $feedbackObject->getFeedbackList();

        $this->render('feedback', ['list' => $feedbacks]);
    }

    public function deleteFeedback()
    {
        $id = $_GET['id'];
        $feedbackObject = new \Model\Feedback();
        $result = $feedbackObject->deleteFeedbackById($id);

        echo $result;
    }

    public function associatedController()
    {
        $userObject = new \Model\User();
        $category = (new \Model\Task())->getCategoryList();
        $classes = (new \Model\Student())->getClassesList();
        $position = $userObject->getPositionList();
        $privilege = $userObject->getPrivilegeList();
        $type = (new \Model\Location())->getTypeList();
        $this->render('associate', [
            'category_task' => $category,
            'classes' => $classes,
            'position' => $position,
            'privilege' => $privilege,
            'type' => $type
        ]);
    }
}
