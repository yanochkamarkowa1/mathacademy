<?php

namespace Model;


class Images extends EntityBase
{
    public function getImageList()
    {
        $result = $this->pdo->query("SELECT * FROM `images`");

        return $result->fetchAll();
    }

    public function addImage($name, $filename)
    {
        $query = "INSERT INTO `images` (`name`, `filename`) VALUES ('$name', '$filename')";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function deleteImageByName($name)
    {
        $fileName = $this->pdo->query("SELECT `filename` FROM `images` WHERE `name` = '$name'")->fetch()['filename'];
        $query = "DELETE FROM `images` WHERE `name` = '$name'";
        $result = $this->pdo->prepare($query);
        $result->execute();
        unlink($_SERVER['DOCUMENT_ROOT'].'/upload/img/'.$fileName);

        return ($result->rowCount()) ? true : false;
    }
}