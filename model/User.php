<?
namespace Model;

/**
 * Класс для работы с пользователями
 */
class User extends EntityBase
{
    /**
     * Возвращает список преподавателей
     * @return array список преподавателей
     */
    public function getTeachersList()
    {
        $query = "SELECT
          `users`.`name`,
          `users`.`surname`,
          `users`.`patronymic`,
          `users`.`email`,
          `privilege`.`name` as `rights`,
          `place_work`.`name` as `place_work`,
          `location`.`name` as `location`,
          `position`.`name` as `position`,
          `images`.`filename` as `foto`
        FROM `users`
          LEFT JOIN `privilege` ON `users`.`rights` = `privilege`.`id`
          LEFT JOIN `place_work` ON `users`.`place_work` = `place_work`.`id`
          LEFT JOIN `location` ON `users`.`location` = `location`.`id`
          LEFT JOIN `position` ON `users`.`position` = `position`.`id`
          LEFT JOIN `images` ON `users`.`foto` = `images`.`name`
        WHERE `users`.`rights` = 2";

        $teachers = $this->pdo->query($query)->fetchAll();

        return $teachers;
    }

    public function getUserList()
    {
        $query = "SELECT
          `users`.`login`,
          `users`.`name`,
          `users`.`surname`,
          `users`.`patronymic`,
          `users`.`email`,
          `privilege`.`name` as `rights`,
          `place_work`.`name` as `place_work`,
          `location`.`name` as `location`,
          `position`.`name` as `position`,
          `images`.`filename` as `foto`
        FROM `users`
          LEFT JOIN `privilege` ON `users`.`rights` = `privilege`.`id`
          LEFT JOIN `place_work` ON `users`.`place_work` = `place_work`.`id`
          LEFT JOIN `location` ON `users`.`location` = `location`.`id`
          LEFT JOIN `position` ON `users`.`position` = `position`.`id`
          LEFT JOIN `images` ON `users`.`foto` = `images`.`name`";

        $users = $this->pdo->query($query)->fetchAll();

        return $users;
    }

    public function checkLogin($login, $pass)
    {
        $password = $pass;
        $query = "SELECT `users`.`login` FROM `users` WHERE `users`.`password` = '$password' AND `users`.`login` = '$login'";
        $result = $this->pdo->query($query)->fetch();
        return ($result) ? $result['login'] : false;
    }
}