<?php

namespace Controller;

class AdminController{

    protected $route;

    /**
     * Отображает шаблон страницы с заполненными данными
     * @param string $name имя файла шаблона
     * @param array $args массив данных, передваваемых в шаблон
     */
    protected function render($name, $args = [])
    {
        $css = '/assets/css/'.$this->route.'.css';
        extract($args);
        ob_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/view/admin/' . $name . '.php'); 
		$content = ob_get_clean(); 
		require_once($_SERVER['DOCUMENT_ROOT'] . '/view/admin/template.php');
    }

    public function feedbackController()
    {
        $obj= new \Model\AdminModel();
        $feedback = $obj->GetFeedBack();
        $this->render('feedback', $feedback);
    }

    public function newsController()
    {
        $obj = new \Model\AdminModel();

        if(isset($_POST['submit'])) {
            $obj->ChangeNews($_POST['id'], $_POST['name'], $_POST['description'],
                $_POST['content'], $_FILES['photo']['name']);
        }
        if(isset($_POST['delete'])){
            $obj->DeleteNews($_POST['id']);
        }
        $news = $obj->GetNews();
        $this->render('news', $news);
    }

    public function taskController()
    {
        $obj = new \Model\AdminModel();

        if(isset($_POST['submit'])) {
            $obj->ChangeTask($_POST['id'], $_POST['name'], $_POST['category'],
                $_POST['content'], $_POST['solution']);
        }
        if(isset($_POST['delete'])){
            $obj->DeleteTask($_POST['id']);
        }
        $task['task'] = $obj->GetTask();
        $task['category'] = $obj->GetCategory();
        $this->render('task', $task);
    }


    public function place_workController()
    {
        $obj = new \Model\AdminModel();

        if(isset($_POST['submit'])) {
            $obj->ChangePlaceWork($_POST['id'], $_POST['name'], $_POST['email'], $_POST['address']);
        }
        if(isset($_POST['delete'])){
            $obj->DeletePlaceWork($_POST['id']);
        }
        $place_work = $obj->GetPlaceWork();
        $this->render('placework', $place_work);
    }


    public function teacherController()
    {
        $obj = new \Model\AdminModel();

        if(isset($_POST['submit'])) {
            $obj->ChangeUser($_POST['login'], $_POST['password'], $_POST['surname'],
                $_POST['name'], $_POST['patronymic'], $_POST['email'], $_POST['place_work'],
                $_POST['location'], $_POST['rights'], $_POST['position'], $_FILES['photo']['name']);
        }
        if(isset($_POST['delete'])){
            $obj->DeleteUser($login);
        }

        $teacher['user'] = $obj->GetTeacher();
        $teacher['placework'] = $obj->GetPlaceWork();
        $teacher['location'] = $obj->GetLocation();
        $teacher['position'] = $obj->GetPosition();
        $teacher['rights'] = $obj->GetPrivilege();

        $this->render('teacher', $teacher);
    }

    public function studentController()
    {
        $obj = new \Model\AdminModel();

        if(isset($_POST['submit'])) {
            $obj->ChangeStudent($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['patronymic'],
            $_POST['place_work'], $_POST['classes'], $_POST['location']);
        }
        if(isset($_POST['delete'])){
            $obj->DeleteStudent($_POST['id']);
			$obj->DeleteStudent(3);
        }

        $student['user'] = $obj->GetStudent();
        $student['placework'] = $obj->GetPlaceWork();
        $student['location'] = $obj->GetLocation();
        $student['classes'] = $obj->GetClasses();
        
        $this->render('student', $student);
    }

	public function indexController()
    {
        if($_POST['submit']){
            $userObject = new \Model\User();
            $result = $userObject->checkLogin($_POST['login'], $_POST['password']);
            $_SESSION['admin'] = $result;
        }
        if($_SESSION['admin']){
            //header( 'Location:../feedback_admin', true, 303 );
			//header( 'Location:../student_admin', true, 303 );
			header( 'Location:../news_admin', true, 303 );
			//header( 'Location:../task_admin', true, 303 );
			//header( 'Location:../placework_admin', true, 303 );
			//header( 'Location:../teacher_admin', true, 303 );
        } else {
            $this->render('login');
        }
    }
	
}

