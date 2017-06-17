<?php foreach ($args['user'] as $item):?>
    <form action="" method="post">
        <input type="text" placeholder="id" name="id" value="<?= $item['id']?>" readonly>
        <input type="text" placeholder="фамилия" name="surname" value="<?= $item['surname']?>">
        <input type="text" placeholder="имя" name="name" value="<?= $item['name']?>">
        <input type="text" placeholder="очество" name="patronymic" value="<?= $item['patronymic']?>">

        <select name="location">
            <?php foreach ($args['location'] as $location):?>
                <?php if($item['location'] == $location['$id']):?>
                    <option selected value = '<?= $location['id']?>'><?= $location['name']?></option>
                <?php else: ?>
                    <option value = '<?= $location['id']?>'><?= $location['name']?></option>
                <?php endif ?>
            <?php endforeach;?>
        </select>

        <select name="place_work">
            <?php foreach ($args['placework'] as $place_work):?>
                <?php if($item['place_work'] == $place_work['$id']):?>
                    <option selected value = '<?= $place_work['id']?>'><?= $place_work['name']?></option>
                <?php else: ?>
                    <option value = '<?= $place_work['id']?>'><?= $place_work['name']?></option>
                <?php endif ?>
            <?php endforeach;?>
        </select>

        <select name="classes">
            <?php foreach ($args['classes'] as $classes):?>
                <?php if($item['classes'] == $classes['$id']):?>
                    <option selected value = '<?= $classes['id']?>'><?= $classes['name']?></option>
                <?php else: ?>
                    <option value = '<?= $classes['id']?>'><?= $classes['name']?></option>
                <?php endif ?>
            <?php endforeach;?>
        </select>

        <input type="submit" value="Удалить" name="delete">
        <input type="submit" value="Изменить" name="submit">
    </form>
<?php endforeach;?>