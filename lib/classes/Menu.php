<?

/**
 * Класс для работы с меню
 */
class Menu
{
    protected $menu;
    protected $title = '';

    public function __construct()
    {
        $this->menu = [
            'index' => [
                'title' => 'Главная',
                'url' => '/',
                'is_active' => false,
                'alias' => [
                    '/index.php',
                    '/'
                ]
            ],
            'news' => [
                'title'=> 'Новости',
                'url' => '/news.php',
                'is_active' => false,
                'alias' => [
                    '/news.php',
                    '/news_detail.php'
                ]
            ],
            'task' => [
                'title'=> 'Задачи',
                'url' => '/tasks.php',
                'is_active' => false,
                'alias' => [
                    '/tasks.php'
                ]
            ]
        ];
        $this->setActive();
        $this->setChildren();
    }

    /**
     * Устанавливает активный пункт меню
     */
    protected function setActive()
    {
        $currentRoute = $_SERVER['SCRIPT_NAME'];

        foreach ($this->menu as &$link) {
            if(in_array($currentRoute, $link['alias'])) {
                $link['is_active'] = true;
                $this->title = $link['title'];
            }
        }
        unset($link);
    }

    /**
     * Устанавливает подпункты меню
     */
    protected function setChildren()
    {
        $category = (new Task())->getCategoryList();
        foreach ($category as $item){
            $this->menu['task']['children'][] = [
                'title' => $item['name_category'],
                'url' => '/tasks.php?category='.$item['id']
            ];
        }
    }

    /**
     * Возвращает массив меню
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }
}



