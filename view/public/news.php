<div class="news-list">
    <?foreach ($news as $item):?>
        <div class="news-item">
            <div class="news-item__img"><img src="/upload/img/<?=$item['foto']?>"></div>
            <div class="news-item__title"><h4><?=$item['name']?></h4></div>
            <div class="news-item__date"><?=$item['data']?></div>
            <div class="news-item__description"><?=$item['description']?></div>
            <div class="news-item__detail"><a href="/news_detail?id=<?=$item['id']?>">Подробнее</a></div>
        </div>
    <?endforeach;?>
    <div class="pagination">
        <?for($i = 1; $i <= $pagination['count_page']; $i++):?>
            <?if($i == $pagination['current_page']):?>
                <span class="pagination__item"><?=$i?></span>
            <?else:?>
                <a class="pagination__item" href="/news/<?=$i?>"><?=$i?></a>
            <?endif?>
        <?endfor;?>
    </div>
</div>
