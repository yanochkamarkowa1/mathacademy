<div class="teachers-list">
    <?foreach ($args as $teacher):?>
        <div class="teachers-item">
            <div class="teachers-item__img"><img src="/upload/img/<?=$teacher['foto']?>"></div>
            <div class="teachers-item__fio"><h4><?=$teacher['surname']?> <?=$teacher['name']?> <?=$teacher['patronymic']?></h4></div>
            <div class="teachers-item__email"><b>Email:</b> <?=$teacher['email']?></div>
            <div class="teachers-item__place_work"><b>Место работы:</b> <?=$teacher['place_work']?></div>
            <div class="teachers-item__position"><b>Должность:</b> <?=$teacher['position']?></div>
        </div>
    <?endforeach;?>
</div>