<?
$menu = [
    [
        'title' => 'Главная',
        'url' => '/',
        'is_active' => false
    ],
    [
        'title'=> 'Новости',
        'url' => '/news.php',
        'is_active' => false
    ]
];

$currentRoute = $_SERVER['REQUEST_URI'];

foreach ($menu as &$link) {
    if($link['url'] == $currentRoute) {
        $link['is_active'] = true;
    }
}
unset($link);