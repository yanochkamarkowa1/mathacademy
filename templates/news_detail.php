<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php') ?>

<div class="news-detail">
    <div class="news-detail--title"><h1><?=$newsDetail['name']?></h1></div>
    <div class="news-detail--date">Новость добавлена: <?=$newsDetail['data']?></div>
    <div class="news-detail--img"><img src="/img/upload/<?=$newsDetail['foto']?>"></div>
    <div class="news-detail--content"><?=$newsDetail['content']?></div>
    <div class="news-detail--back"><a href="/news.php">Назад к списку</a></div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php') ?>