<?

class Feedback
{
    protected $pdo;
    /**
     * Получает объект подключеия к базе данных
     */
    public function __construct()
    {
        $this->pdo = (new DbConfig())->getConnect();
    }

    public function addFeedback($fullName, $email, $text, $captcha)
    {
        $secret = '6LdJ8RgUAAAAAFtTCdZx7FlYdNtVQYZM1U01p_8Z'; /*TODO поменять при переносе*/
        $date = date('Y-m-d');
        $errors = [];
        $isError = false;
        $reCaptcha = new ReCaptcha($secret);

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
}