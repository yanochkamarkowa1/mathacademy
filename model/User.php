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
        WHERE `users`.`rights` = 2";

        $teachers = $this->pdo->query($query)->fetchAll();

        return $teachers;
    }

    public function checkLogin($login, $pass)
    {
        $password = $pass;
        $query = "SELECT `users`.`login` FROM `users` WHERE `users`.`password` = '$password' AND `users`.`login` = '$login'";
        $result = $this->pdo->query($query)->fetch();
        return ($result) ? $result['login'] : false;
    }
}