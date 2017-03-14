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

    public function addFeedback($fullName, $email, $text)
    {
        $date = date('Y-m-d');
        $errors = [];
        $isError = false;

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