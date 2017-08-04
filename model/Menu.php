<?
namespace Model;

/**
 * Класс для работы с меню
 */
class Menu
{
    protected $menu;
    protected $title = '';

    /**
     * Устанавливает массив меню
     */
    public function __construct()
    {
        $this->menu = [
            'index' => [
                'title' => 'Главная',
                'url' => '/',
                'is_active' => false,
                'alias' => [
                    '/',
                    ''
                ]
            ],
            'news' => [
                'title'=> 'Новости',
                'url' => '/news/',
                'is_active' => false,
                'alias' => [
                    '/news/',
                    '/news_detail/'
                ]
            ],
            'tasks' => [
                'title'=> 'Задачи',
                'url' => '/tasks/',
                'is_active' => false,
                'alias' => [
                    '/tasks/'
                ]
            ],
            'play' => [
                'title'=> 'Поиграем',
                'url' => '/play/',
                'is_active' => false,
                'alias' => [
                    '/play/'
                ]
            ],
            'teachers' => [
                'title'=> 'Преподаватели',
                'url' => '/teachers/',
                'is_active' => false,
                'alias' => [
                    '/teachers/'
                ]
            ],
            'feedback' => [
                'title'=> 'Обратная связь',
                'url' => '/feedback/',
                'is_active' => false,
                'alias' => [
                    '/feedback/'
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
        $currentRoute = $_SERVER['REDIRECT_URL'];
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
            $this->menu['tasks']['children'][] = [
                'title' => $item['name_category'],
                'url' => '/tasks/?category='.$item['id']
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

    /**
     * Возвращает заголовок
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}



