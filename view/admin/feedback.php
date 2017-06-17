<?php foreach ($args as $item):?>
    <div class="feedback-content">
        <div class="feedback-item">
            <div class="feedback-item-name">Номер новости</div>
            <div class="feedback-item-value"><?php echo $item['id']; ?></div>
        </div>
        <div class="feedback-item">
            <div class="feedback-item-name">Имя отправителя</div>
            <div class="feedback-item-value"><?php echo $item['full_name']; ?></div>
        </div>
        <div class="feedback-item">
            <div class="feedback-item-name">Электронная почта</div>
            <div class="feedback-item-value"><?php echo $item['email']; ?></div>
        </div>
        <div class="feedback-item">
            <div class="feedback-item-name">Дата запроса</div>
            <div class="feedback-item-value"><?php echo $item['data']; ?></div>
        </div>
        <div class="feedback-item">
            <div class="feedback-item-name">Сообщение</div>
            <div class="feedback-item-value"><?php echo $item['message']; ?></div>
        </div>
    </div>

<?php endforeach;?>

