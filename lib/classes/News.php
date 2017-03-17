<?

/**
 * Класс для работы с новостями
 */
class News extends EntityBase
{
    private $count;
    private $page;

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
        $result = $this->pdo->query(
            "SELECT `id`, `data`, `name`, `description`, `foto` FROM `news` ORDER BY `data` DESC LIMIT $limitFrom, $count"
        );
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
        $query = $this->pdo->query(
            "SELECT COUNT(*) AS count FROM `news`"
        );
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
     * @param $id int id новости
     * @return mixed
     */
    public function getNewsById($id)
    {
        $result = $this->pdo->query(
            "SELECT `id`, `data`, `name`, `content`, `foto`  FROM `news` WHERE `id` = $id"
        )->fetch();
        $result['data'] = date('d.m.Y', strtotime($result['data']));
        return $result;
    }

}