<?

class News
{
    private $count;
    private $page;
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new DbConfig())->getConnect();
    }

    /**
     * Возвращает список новостей
     * @param $page int страница
     * @param $count int количество
     * @return array список новостей
     */
    public function getNewsList($page = 1, $count = 10)
    {
        $this->count = $count;
        $this->page = $page;

        $limitFrom = $count * ($page - 1);
        $limitTo = $limitFrom + $count;
        $result = $this->pdo->query("SELECT * FROM `news` ORDER BY `data` DESC LIMIT $limitFrom, $limitTo");
        $news = [];
        while ($item = $result->fetch()) {
            $item['data'] = date('d.m.Y', strtotime($item['data']));
            $news[] = $item;
        }
        return $news;
    }

    /**
     * Возвращает массив с количеством страниц и текущей страницей
     * @return array
     */
    public function getPagination()
    {
        $query = $this->pdo->query("SELECT COUNT(*) FROM `news`");
        $result = $query->fetch();
        $countNews = $result['count'];
        $countPage = ceil($countNews / $this->count);
        return [
            'count_page' => $countPage,
            'current_page' => $this->page
        ];
    }

    /**
     * Получает новость
     * @param $id int id Новости
     * @return mixed
     */
    public function getNewsById($id)
    {
        $result = $this->pdo->query("SELECT * FROM `news` WHERE `id` = $id");
        return $result->fetch();
    }

}