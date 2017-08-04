<?
namespace Model;

/**
 * Класс для подключения к базе данных
 */
class DbConfig
{
    private $host = '';
    private $db   = '';
    private $user = '';
    private $pass = '';
    private $charset = 'utf8';

    public function __construct()
    {
        require ($_SERVER['DOCUMENT_ROOT'].'/.dbconf.php');
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    /**
     * Производит подключение к базе данных
     * @return \PDO
     */
    public function getConnect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, $this->user, $this->pass, $opt);

        return $pdo;
    }
}
