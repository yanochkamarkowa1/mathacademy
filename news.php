<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

class News
{
    private $count = 10;
    private $page;
    private $pdo;

    /**
     * @param $page int номер страницы
     */
    public function __construct($page)
    {
        $this->pdo = (new DbConfig())->getConnect();
        $this->page = $page;
    }

    /**
     * Возвращает список новостей
     * @return array список новостей
     */
    public function getNews()
    {
        $limitFrom = $this->count * $this->page;
        $limitTo = $limitFrom + $this->count;
        $result = $this->pdo->query("SELECT * FROM `news` ORDER BY `data` DESC LIMIT $limitFrom, $limitTo");
        $news = [];
        while ($item = $result->fetch()) {
            $item['data'] = date('d.m.Y', strtotime($item['data']));
            $news[] = $item;
        }
        return $news;
    }

}

$page = $_GET['page'] ? $_GET['page'] - 1 : 0;
$newsObject = new News($page);
$news = $newsObject->getNews();

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/news.php');