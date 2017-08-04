<?
namespace Controller;

/**
 * Отвечает за логику каждой страницы публичного раздела
 */
class PublicController
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
        $menuObject = new \Model\Menu();
        $menu = $menuObject->getMenu();
        $title = $menuObject->getTitle();
        $css = '/assets/css/'.$this->route.'.css';
        extract($args);
        ob_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/public/' . $name . '.php');
        $content = ob_get_clean();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/public/template.php');
    }

    public function indexController()
    {
        $newsObject = new \Model\News();
        $news = $newsObject->getNewsList(1, 5);
        $this->render('index', ['news' => $news]);
    }

    public function newsController()
    {
        $page = $_GET['page'] ? : 1;
        $newsObject = new \Model\News();
        $news = $newsObject->getNewsList($page);
        $pagination = $newsObject->getPagination();
        $this->render('news', ['news' => $news, 'pagination' => $pagination]);
    }

    public function newsDetailController()
    {
        $newsId = $_GET['id'];
        $newsObject = new \Model\News();
        $newsDetail = $newsObject->getNewsById($newsId);
        $this->render('news_detail', ['newsDetail' => $newsDetail]);
    }

    public function feedbackController()
    {
        $errors = [];
        $oldValues = [];
        $formDone = false;
        if ($_POST['submit']) {
            $feedbackObject = new \Model\Feedback();
            $result = $feedbackObject->addFeedback($_POST['fio'], $_POST['email'], $_POST['text'], $_POST['g-recaptcha-response']);
            if (is_array($result)) {
                $errors = $result['errors'];
                $oldValues = $result['old_values'];
            } else {
                $formDone = true;
            }
        }
        $this->render('feedback', ['errors' => $errors, 'oldValues' => $oldValues, 'formDone' => $formDone]);
    }

    public function playController()
    {
        $this->render('play');
    }

    public function tasksController()
    {
        $page = $_GET['page'] ? : 1;
        $category = $_GET['category'] ? : null;
        $taskObject = new \Model\Task();
        $tasks = $taskObject->getTasksList($page, 3, $category);
        $pagination = $taskObject->getPagination();
        $categoryName = $taskObject->getCurrentCategory();
        $this->render('tasks', [
            'tasks' => $tasks,
            'pagination' => $pagination,
            'categoryName' => $categoryName,
            'categoryId' => $category
        ]);
    }

    public function teachersController()
    {
        $userObject = new \Model\User();
        $teachers = $userObject->getTeachersList();

        $this->render('teachers', $teachers);
    }
}