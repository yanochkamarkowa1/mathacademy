<?if($categoryName):?>
<h3><?=$categoryName?></h3>
<?endif;?>
<div class="tasks-list">
    <?foreach ($tasks as $item):?>
        <div class="task-item">
            <div class="task-item__title"><h4><?=$item['name']?></h4></div>
            <div class="task-item__content"><?=$item['content']?></div>
            <div class="task-item__show">Указание к решению</div>
            <div class="task-item__solution"><?=$item['solution']?></div>
        </div>
    <?endforeach;?>
    <div class="pagination">
        <?for($i = 1; $i <= $pagination['count_page']; $i++):?>
            <?if($i == $pagination['current_page']):?>
                <span class="pagination__item"><?=$i?></span>
            <?else:?>
                <a class="pagination__item" href="tasks/?page=<?=$i?>"><?=$i?></a>
            <?endif?>
        <?endfor;?>
    </div>
</div>
