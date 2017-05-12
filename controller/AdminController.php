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
}