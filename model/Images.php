<?php

namespace Model;


class Images extends EntityBase
{
    public function getImageList()
    {
        $result = $this->pdo->query("SELECT * FROM `images`");

        return $result->fetchAll();
    }
}