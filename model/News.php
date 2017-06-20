<?
namespace Model;

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
            "SELECT `id`, `data`, `news`.`name` as name, `description`, `images`.`filename` as foto
                FROM `news` 
                LEFT JOIN `images` ON `news`.`foto` = `images`.`name` ORDER BY `data` DESC LIMIT $limitFrom, $count"
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
        $news = $this->pdo->query(
            "SELECT `id`, `data`, `news`.`name` as name, `content`, `description`, `images`.`filename` as foto, `images`.`name` as foto_name
                FROM `news` 
                LEFT JOIN `images` ON `news`.`foto` = `images`.`name`
                WHERE `id` = $id"
        )->fetch();
        $news['data'] = date('d.m.Y', strtotime($news['data']));
        return $news;
    }

    public function saveNews($id, $data, $name, $description, $content, $foto)
    {
        $data = date("Y-m-d", strtotime($data));
        $query = "UPDATE `news` SET `data` = '$data', `name` = '$name', `description` = '$description', `content` = '$content', `foto` = '$foto' WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function addNews($data, $name, $description, $content, $foto)
    {
        $data = date("Y-m-d", strtotime($data));
        $query = "INSERT INTO `news` (`data`, `name`, `description`, `content`, `foto`) VALUES ('$data', '$name', '$description', '$content', '$foto')";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function deleteNewsById($id)
    {
        $query = "DELETE FROM `news` WHERE `id` = $id";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

}