<?

class User
{
    protected $pdo;
    protected $count;
    protected $page;

    public function __construct()
    {
        $this->pdo = (new DbConfig())->getConnect();
    }

    /**
     * Возвращает список преподавателей
     * @param $page int страница
     * @param $count int количество
     * @return array список задач
     */
    public function getTeachersList($page = 1, $count = 10)
    {
        $this->count = $count;
        $this->page = $page;

        $limitFrom = $count * ($page - 1);

        $query = "SELECT
          `users`.`name`,
          `users`.`surname`,
          `users`.`patronymic`,
          `users`.`email`,
          `users`.`foto`,
          `privilege`.`name` as `rights`,
          `place_work`.`name` as `place_work`,
          `location`.`name` as `location`,
          `position`.`name` as `position`
        FROM `users`
          INNER JOIN `privilege` ON `users`.`rights` = `privilege`.`id`
          INNER JOIN `place_work` ON `users`.`place_work` = `place_work`.`id`
          INNER JOIN `location` ON `users`.`location` = `location`.`id`
          INNER JOIN `position` ON `users`.`position` = `position`.`id`
        WHERE `privilege`.`id` = 2
        LIMIT $limitFrom, $this->count";

        $users = $this->pdo->query($query)->fetchAll();

        return $users;
    }
}