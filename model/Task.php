<?
namespace Model;

/**
 * Класс для работы с задачами
 */
class Task extends EntityBase
{
    protected $count;
    protected $page;
    protected $category;

    /**
     * Возвращает список задач
     * @param $page int страница
     * @param $count int количество
     * @param $category int категория
     * @return array список задач
     */
    public function getTasksList($page = 1, $count = 10, $category = null)
    {
        $this->count = $count;
        $this->page = $page;
        $this->category = $category;

        $limitFrom = $count * ($page - 1);
        if($this->category) {
            $query = "SELECT * FROM `task` WHERE `category` = $this->category LIMIT $limitFrom, $count";
        } else {
            $query = "SELECT *, task.id as id, category_task.name_category as name_category, category_task.id as category_id FROM `task` 
              JOIN category_task ON task.category = category_task.id
              LIMIT $limitFrom, $count";
        }
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }

    /**
     * Возвращает массив с количеством страниц и текущей страницей
     * @return array
     */
    public function getPagination()
    {
        if($this->category){
            $query = $this->pdo->query(
                "SELECT COUNT(*) AS count FROM `task` WHERE `category` = $this->category"
            );
        } else {
            $query = $this->pdo->query(
                "SELECT COUNT(*) AS count FROM `task`"
            );
        }
        $result = $query->fetch();
        $countNews = $result['count'];
        $countPage = ceil($countNews / $this->count);
        return [
            'count_page' => $countPage,
            'current_page' => $this->page
        ];
    }


    /**
     * Получает список категорий задач
     * @return array
     */
    public function getCategoryList()
    {
        return $this->pdo->query("SELECT * FROM `category_task`")->fetchAll();
    }

    /**
     * Получает имя текущей категории
     * @return array|bool
     */
    public function getCurrentCategory()
    {
        if ($this->category) {
            return $this->pdo
                        ->query(
                            "SELECT `name_category` FROM `category_task` WHERE `id` = $this->category"
                        )->fetch()['name_category'];
        } else {
            return false;
        }
    }

    public function getTaskById($id)
    {
        $task = $this->pdo->query("SELECT `task`.`id`, `task`.`name` as name, `content`, `solution`, `category_task`.`name_category` as category, `category_task`.`id` as category_id
          FROM `task`
          LEFT JOIN `category_task` ON `task`.`category` = `category_task`.`id`
          WHERE `task`.`id` = '$id'")->fetch();

        return $task;
    }

    public function saveTask($id, $name, $category, $content, $solution)
    {
        $query = "UPDATE `task` SET `name` = '$name', `category` = '$category', `content` = '$content', `solution` = '$solution' WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function addTask($name, $category, $content, $solution)
    {
        $query = "INSERT INTO `task` (`name`, `category`, `content`, `solution`) VALUES ('$name', '$category', '$content', '$solution')";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
    
    public function deleteTaskById($id)
    {
        $query = "DELETE FROM `task` WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
}