<?php

namespace Model;

class Student extends EntityBase
{
    public function getStudentList()
    {
        $result = $this->pdo->query(
            "SELECT student.id, surname, student.name, patronymic, place_work.name as place_work, classes.name as classes
              FROM student
              LEFT JOIN place_work ON student.pleace_work = place_work.id
              LEFT JOIN classes ON student.classes = classes.id"
        );

        return $result->fetchAll();
    }

    public function getStudentById($id)
    {
        $student = $this->pdo->query(
            "SELECT student.id, surname, student.name, patronymic, 
              place_work.name as place_work, classes.name as classes,
              location.name as location, place_work.id as place_work_id,
              location.id as location_id, classes.id as classes_id
              FROM student
              LEFT JOIN place_work ON student.pleace_work = place_work.id
              LEFT JOIN classes ON student.classes = classes.id
              LEFT JOIN location ON student.location = location.id
              WHERE student.id = '$id'"
        )->fetch();

        $placeWork = (new PlaceWork())->getPlaceWorkList();
        $location = (new Location())->getLocationList();
        $classes = $this->pdo->query("SELECT * FROM classes")->fetchAll();

        return [
            'student' => $student,
            'place_work' => $placeWork,
            'location' => $location,
            'classes' => $classes
        ];
    }

    public function saveStudent($id, $name, $surname, $patronymic, $placeWork, $classes, $location)
    {
        $query = "UPDATE `student` SET `name` = '$name', `surname` = '$surname', `patronymic` = '$patronymic', `pleace_work` = '$placeWork', `classes` = '$classes', `location` = '$location' WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }

    public function deleteStudentById($id)
    {
        $query = "DELETE FROM `student` WHERE `id` = $id";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
}