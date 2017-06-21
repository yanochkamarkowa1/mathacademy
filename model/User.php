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
        $query = "SELECT `users`.`password`, `users`.`rights`  FROM `users` WHERE `users`.`login` = '$login'";
        $result = $this->pdo->query($query)->fetch();
        $resultPassword = $result['password'];
        if (hash_equals($resultPassword, crypt($password, $resultPassword)) && ($result['rights'] == 1 || $result['rights'] == 2)) {
            return [
                'login' => $login,
                'rights' => $result['rights']
            ];
        } else {
            return false;
        }
    }

    public function getUserByLogin($login)
    {
        $query = "SELECT
          `users`.`login`,
          `users`.`name`,
          `users`.`surname`,
          `users`.`patronymic`,
          `users`.`email`,
          `users`.`password`,
          `privilege`.`name` as `rights`,
          `place_work`.`name` as `place_work`,
          `location`.`name` as `location`,
          `position`.`name` as `position`,
          `images`.`filename` as `foto`,
          `privilege`.`id` as `privilege_id`,
          `place_work`.`id` as `place_work_id`,
          `location`.`id` as `location_id`,
          `position`.`id` as `position_id`,
          `images`.`name` as `foto_name`
        FROM `users`
          LEFT JOIN `privilege` ON `users`.`rights` = `privilege`.`id`
          LEFT JOIN `place_work` ON `users`.`place_work` = `place_work`.`id`
          LEFT JOIN `location` ON `users`.`location` = `location`.`id`
          LEFT JOIN `position` ON `users`.`position` = `position`.`id`
          LEFT JOIN `images` ON `users`.`foto` = `images`.`name`
        WHERE `users`.`login` = '$login'";

        $user = $this->pdo->query($query)->fetch();

        return $user;
    }

    public function getPositionList()
    {
        $position = $this->pdo->query('SELECT * FROM `position`');

        return $position;
    }

    public function getPrivilegeList()
    {
        $privilege = $this->pdo->query('SELECT * FROM `privilege`');

        return $privilege;
    }

    public function saveUser($login, $name, $surname, $patronymic, $email, $rights,  $placeWork, $location, $position, $foto, $password)
    {
        $addPassword = " ";
        if(!empty($password)){
            $password = crypt($password);
            $addPassword = "`password` = '$password', ";
        }
        $query = "
            UPDATE `users`
            SET $addPassword`name` = '$name', `surname` = '$surname', `patronymic` = '$patronymic', 
                `place_work` = '$placeWork', `email` = '$email', `location` = '$location',
                `rights` = '$rights', `position` = '$position', `foto` = '$foto'
            WHERE `login` = '$login'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function deleteUserByLogin($login)
    {
        $query = "DELETE FROM `users` WHERE `login` = '$login'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function addUser($login, $name, $surname, $patronymic, $email, $rights,  $placeWork, $location, $position, $foto, $password)
    {
        $password = crypt($password);
        $query = "
            INSERT INTO `users`
            (`password` , `login`,`name` , `surname` , `patronymic` , `place_work` , `email` , `location` , `rights` , `position` , `foto`)
             VALUES 
            ('$password', '$login', '$name', '$surname', '$patronymic', '$placeWork', '$email', '$location', '$rights', '$position', '$foto')";
        $result = $this->pdo->prepare($query);
        
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
}