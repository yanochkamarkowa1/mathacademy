<?php

namespace Model;

class Location extends EntityBase
{
    public function getLocationList()
    {
        $result = $this->pdo->query(
            "SELECT `location`.`id`, `location`.`name`, type.name as type
              FROM `location` 
              INNER JOIN `type` ON location.type = type.id"
        );

        return $result->fetchAll();
    }

    public function getLocationById($id)
    {
        $location = $this->pdo->query(
            "SELECT `location`.`id`, `location`.`name`, type.name as type, location.type as type_id
              FROM `location` 
              INNER JOIN `type` ON location.type = type.id WHERE location.id = $id"
        )->fetch();

        $types = $this->pdo->query("SELECT * FROM type")->fetchAll();

        return [
            'location' => $location,
            'types' => $types
        ];
    }

    public function saveLocation($id, $name, $type)
    {
        $query = "UPDATE `location` SET `name` = '$name', `type` = '$type' WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

}