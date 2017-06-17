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
}