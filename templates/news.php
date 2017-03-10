<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php') ?>
<?foreach ($news as $item):?>
    <?=$item['data']?><br>
    <?=$item['name']?><br>
    <?=$item['description']?><br>
    <?=$item['content']?><br>
    <img src="/img/upload/<?=$item['foto']?>">
<?endforeach;?>
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php') ?>
