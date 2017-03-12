<?

/**
 * Класс для работы с задачами
 */
class Task
{
    protected $pdo;
    protected $count;
    protected $page;

    public function __construct()
    {
        $this->pdo = (new DbConfig())->getConnect();
    }

    /**
     * Возвращает список задач
     * @param $page int страница
     * @param $count int количество
     * @param $category int категория
     * @return array список задач
     */
    public function getNewsList($page = 1, $count = 10, $category = null)
    {
        $this->count = $count;
        $this->page = $page;

        $limitFrom = $count * ($page - 1);
        if($category) {
            $query = "SELECT * FROM `task` WHERE `category` = $category LIMIT $limitFrom, $count";
        } else {
            $query = "SELECT * FROM `task` LIMIT $limitFrom, $count";
        }
        $tasks = $this->pdo->query($query)->fetchAll();
        return $tasks;
    }

    /**
     * Получает список категорий задач
     * @return array
     */
    public function getCategoryList()
    {
        return $this->pdo->query("SELECT * FROM `category_task`")->fetchAll();
    }
}