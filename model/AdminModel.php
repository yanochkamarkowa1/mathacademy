<?php

namespace Model;

class AdminModel extends  EntityBase
{
    # Удаление пользователя
    
    public function DeleteUser($login)
    {
        $query = "DELETE FROM `users` WHERE  `login`  = '" . $login . "'";
        $result = $this->pdo-> exec($query);
        return ($result) ? true : false;
    }


    # Удаление новости
    
    public function DeleteNews($id)
    {
        $query = "DELETE FROM `news` WHERE  `id`  = '" . $id . "'";
        $result = $this->pdo-> exec($query);
        return ($result) ? true : false;
    }


    # Удаление задачи
   
    public function DeleteTask($id)
    {
        $query = "DELETE FROM `task` WHERE  `id`  = '" . $id . "'";
        $result = $this->pdo-> exec($query);
        return ($result) ? true : false;
    }


    # Удаление ученика
    
    public function DeleteStudent($id)
    {
        $query = "DELETE FROM `student` WHERE  `id`  = '" . $id . "'";
        $result = $this->pdo-> exec($query);
        return ($result) ? true : false;
    }


    # Удаление учебного заведения
    
    public function DeletePlaceWork($id)
    {
        $query = "DELETE FROM `place_work` WHERE  `id`  = '" . $id . "'";
        $result = $this->pdo-> exec($query);
        return ($result) ? true : false;
    }


    # Изменение новости
    
    public function ChangeNews($id, $name, $description, $content, $foto){

        if(!isset($id)) return 0;   # если нету id функции не будет отрабатываться

        # проверка на несовподение фотографий
        $query = "SELECT `foto` FROM `news` WHERE `id` = " . $id;
        $result = $this->pdo->query($query)->fetch();
        if($result['foto'] == $foto) $foto = $result['foto'];
        
        if($_FILES['photo']['name'] != '') {
            $src = $_SERVER['DOCUMENT_ROOT'] . '/upload/img/'; # путь
            $this->DeleteImage($result['foto'],$src); # Удаляет старую фотографию
            $this->AddImage($src);
        }

		
				
        $query = "UPDATE `news` SET `name`= '" . $name . "', "
		. " `description` = '" . $description . "', "
		. " `content` = '" . $content . "' ";
		if($_FILES['photo']['name'] != '')
			$query .= " , `foto` = '" . $foto . "' ";
		$query .= "WHERE `id` = " . $id; 
		 
        $result1 = $this->pdo->prepare($query);
        $result1->execute();

        return ($result1->rowCount()) ? true : false;
    }


    # Изменение задачи
    
    public function ChangeTask($id, $name, $category, $content, $solution){

        $query = "UPDATE `task` SET `name`= '" . $name . "', "
            . "`category` =  '" . $category . "', "
            . "`content` =  '" . $content . "', "
            . "`solution` =  '" . $solution . "' "
            . "WHERE `id` = " . $id ;

        $result = $this->pdo->prepare($query);
        $result -> execute();
        return ($result->rowCount()) ? true : false;
    }


    # Изменение учеников
    
    public function ChangeStudent($id, $name, $surname, $patronymic, $pleace_work, $classes, $location){

        $query = "UPDATE `student` SET `name`= '" . $name . "', "
            . "`surname` =  '" . $surname . "', "
            . "`patronymic` =  '" . $patronymic . "', "
            . "`pleace_work` =  '" . $pleace_work . "', "
            . "`classes` =  '" . $classes . "', "
            . "`location` =  '" . $location . "' "
            . "WHERE `id` = " . $id ;

        $result = $this->pdo->prepare($query);
        $result -> execute();
        return ($result->rowCount()) ? true : false;
    }


    # Изменение Учебного заведения
    
    public function ChangePlaceWork($id, $name, $email, $address){

        $query = "UPDATE `place_work` SET `name`= '" . $name . "', "
            . " `email` =  '" . $email . "', "
            . " `address` =  '" . $address . "' "
            . " WHERE `id` = " . $id ;

        $result = $this->pdo->prepare($query);
        $result -> execute();
        return ($result->rowCount()) ? true : false;
    }


    # Измение данных пользователя
    
    public function ChangeUser($login, $password, $surname, $name, $patronymic, $email, $place_work,
                               $location, $rights, $position, $foto){

        $query = "SELECT `foto` FROM `users` WHERE `login` = '" . $login . "' ";
        $result = $this->pdo->query($query)->fetch();
        if($result['foto'] == $foto) $foto = $result['foto'];
        
        if($_FILES['photo']['name'] != '') {
            $src = $_SERVER['DOCUMENT_ROOT'] . '/upload/img/'; # путь
			$this->DeleteImage($result['foto'],$src); # Удалят старую фотографию
            $this->AddImage($src);
        }

			
        $query = "UPDATE `users` SET `name`= '" . $name . "', "
            . "`password` =  '" . $password . "', "
            . "`surname` =  '" . $surname. "', "
            . "`name` =  '" . $name . "', "
            . "`patronymic` =  '" . $patronymic . "', "
            . "`email` =  '" . $email. "', "
            . "`place_work` =  '" . $place_work . "', "
            . "`location` =  '" . $location . "', "
            . "`rights` =  '" . $rights. "', ";
        if($_FILES['photo']['name'] != '')
            $query .= "`foto` =  '" . $foto . "', ";
        $query .= "`position` =  '" . $position . "' "
            . "WHERE `login` = '" . $login . "' ";

        $result = $this->pdo->prepare($query);
        $result -> execute();
        return ($result->rowCount()) ? true : false;
    }


    # Добваление изображения
    
    public function AddImage($src)
    {
        $src .=  basename($_FILES['photo']['name']); # путь
        $image_file_type = pathinfo($src,PATHINFO_EXTENSION);   # формат файла
        $image_file_size =  $_FILES['photo']['size']; # размер файла

        # Проверка является ли файл изображением
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check == false) return false;

        # Проверка на наличее фала с таким именим в папке
        if(file_exists($src)) return false;

        # Проверка на размер файла
        if ($image_file_size > 1000000) return false; # ограниченно 1000КБ

        # Проверка на формат файла
        if($image_file_type != "jpg" && $image_file_type  != "png"
            && $image_file_type  != "jpeg" && $image_file_type  != "gif" )  return false;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $src)) return true;
        else return false;
    }


    # Удаление изображения
    
    public function DeleteImage($file, $src){
        $src .=  $file;
        if(!unlink($src)) return false;
        else return true;
    }


    # Возвращает список обратоной связи
    
    public function GetFeedBack(){
        $query = "SELECT `id`,`full_name`,`email`,`message`,`data` FROM `feedback` ORDER BY `data` DESC";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }

    # Возвращает список новостей
    # @return array
    public function GetNews(){
        $query = "SELECT `id`,`data`, `name`, `description`, `content`, `foto` FROM `news` ORDER BY `id` DESC";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }


    # Возвращает список задач
    # @return array
    public function GetTask()
    {
        $query = "SELECT `id`, `category`, `name`, `content`, `solution` FROM `task`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }

    # Возвращает список учебных заведений
    # @return array
    public function  GetPlaceWork()
    {
        $query = "SELECT `id`, `name`, `email`, `address` FROM `place_work`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }

    public function GetTeacher()
    {
        $query = "SELECT `login`, `password`,`surname`, "
        . " `name`, `patronymic`, `email`, `place_work`, "
        . " `location`, `rights`, `position`, `foto` "
        . " FROM `users` "
        . " WHERE `rights` = 2";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }


    public function GetLocation()
    {
        $query = "SELECT `id`, `name`, `type` FROM `location`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }



    public function GetPosition()
    {
        $query = "SELECT `id`,`name` FROM `position`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }


    public function GetPrivilege()
    {
        $query = "SELECT `id`,`name` FROM `privilege`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }


    public function GetClasses()
    {
        $query = "SELECT `id`, `name` FROM `сlasses`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }


    public function GetStudent()
    {
        $query = "SELECT `id`, `surname`,`name`, `patronymic`, "
        . " `pleace_work`, `classes`, `location` "
        . " FROM `student`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }

    public function GetCategory()
    {
        $query = "SELECT `id`, `name_category` as `name` FROM `category_task`";
        $result = $this->pdo->query($query)->fetchAll();
        return $result;
    }
}
