<?
namespace Model;

/**
 * Класс для работы с обратной связью
 */
class Feedback extends EntityBase
{
    public function addFeedback($fullName, $email, $text, $captcha)
    {
        $secret = '6LegoiYUAAAAALhl-eEJbQS-k4ef1QC5yjVR9_XG';
        $date = date('Y-m-d');
        $errors = [];
        $isError = false;
        $reCaptcha = new \ReCaptcha($secret);

        if ($captcha) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $captcha
            );
            if ($response == null || !$response->success) {
                $errors['captcha'] = 'Проверка не пройдена';
                $isError = true;
            }
        } else {
            $errors['captcha'] = 'Проверка не пройдена';
            $isError = true;
        }

        if(empty($fullName)){
            $errors['fio'] = 'Введите ФИО';
            $isError = true;
        }

        if(empty($email)){
            $errors['email'] = 'Введите email';
            $isError = true;
        }

        if(empty($text)){
            $errors['text'] = 'Введите текст сообщения';
            $isError = true;
        }

        if(!$isError){
            $this->pdo->query(
                "INSERT INTO `feedback` (`full_name`, `email`, `message`, `data`) 
                    VALUES ('$fullName', '$email', '$text', '$date')"
            );
            return true;
        } else {
            $oldValues = [
                'fio' => $fullName,
                'email' => $email,
                'text' => $text
            ];
            return [
                'errors' => $errors,
                'old_values' => $oldValues
            ];
        }

    }

    public function getFeedbackList()
    {
        $feedbacks = $this->pdo->query("SELECT * FROM `feedback`");
        $result = [];
        while ($feedback = $feedbacks->fetch()){
            $feedback['data'] = date('d.m.Y', strtotime($feedback['data']));
            $result[] = $feedback;
        }
        return $result;
    }

    public function deleteFeedbackById($id)
    {
        $query = "DELETE FROM `feedback` WHERE `id` = '$id'";
        $result = $this->pdo->prepare($query);
        $result->execute();

        return ($result->rowCount()) ? true : false;
    }
}