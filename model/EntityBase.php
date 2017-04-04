<?
namespace Model;

/**
 * Базовый класс для работы с сущостями из БД
 */
abstract class EntityBase
{
    protected $pdo;

    /**
     * Получает объект подключеия к базе данных
     */
    public function __construct()
    {
        $this->pdo = (new DbConfig())->getConnect();
    }
}