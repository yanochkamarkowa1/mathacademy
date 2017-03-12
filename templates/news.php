<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php') ?>
<div class="news-list">
    <?foreach ($news as $item):?>
        <div class="news-item">
            <div class="news-item__img"><img src="/img/upload/<?=$item['foto']?>"></div>
            <div class="news-item__title"><h4><?=$item['name']?></h4></div>
            <div class="news-item__date"><?=$item['data']?></div>
            <div class="news-item__description"><?=$item['description']?></div>
            <div class="news-item__detail"><a href="news_detail.php?id=<?=$item['id']?>">Подробнее</a></div>
        </div>
    <?endforeach;?>
    <div class="news-pagination"></div>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php') ?>
