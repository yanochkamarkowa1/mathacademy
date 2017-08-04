<?php

namespace Model;

class PlaceWork extends EntityBase
{
    public function getPlaceWorkList()
    {
        $result = $this->pdo->query(
            "SELECT * FROM place_work"
        );

        return $result->fetchAll();
    }


    public function getPlaceWorkById($id)
    {
        $result = $this->pdo->query(
            "SELECT * FROM `place_work` WHERE `id` = '$id'"
        );

        return $result->fetch();
    }

    public function savePlaceWork($id, $name, $email, $address)
    {
        $query = "UPDATE `place_work` SET `name` = '$name', `email` = '$email', `address` = '$address' WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function addPlaceWork($name, $email, $address)
    {
        $query = "INSERT INTO `place_work` (`name`, `email`, `address`) VALUES ('$name', '$email', '$address')";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function deletePlaceWorkById($id)
    {
        $query = "DELETE FROM `place_work` WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
}