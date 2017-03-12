<?
$menu = [
    [
        'title' => 'Главная',
        'url' => '/',
        'is_active' => false,
        'alias' => [
            '/index.php',
            '/'
        ]
    ],
    [
        'title'=> 'Новости',
        'url' => '/news.php',
        'is_active' => false,
        'alias' => [
            '/news.php',
            '/news_detail.php'
        ]
    ]
];
$title = '';

$currentRoute = $_SERVER['SCRIPT_NAME'];

foreach ($menu as &$link) {
    if(in_array($currentRoute, $link['alias'])) {
        $link['is_active'] = true;
        $title = $link['title'];
    }
}
unset($link);