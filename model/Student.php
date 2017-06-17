<?php

namespace Model;

class Student extends EntityBase
{
    public function getStudentList()
    {
        $result = $this->pdo->query(
            "SELECT student.id, surname, student.name, patronymic, place_work.name as place_work, classes.name as classes
              FROM student
              INNER JOIN place_work ON student.pleace_work = place_work.id
              INNER JOIN classes ON student.classes = classes.id"
        );

        return $result->fetchAll();
    }
}