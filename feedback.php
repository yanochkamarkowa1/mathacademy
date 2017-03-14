<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/lib/init.php');

if($_POST['submit']){
    $feedbackObject = new Feedback();
    $result = $feedbackObject->addFeedback($_POST['fio'], $_POST['email'], $_POST['text']);
    if(is_array($result)){
        $errors = $result['errors'];
        $oldValues = $result['old_values'];
    } else {
        $formDone = true;
    }
}

require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/feedback.php');