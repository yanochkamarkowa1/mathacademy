<?php foreach ($args['user'] as $item):?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="логин" name="login" value="<?= $item['login']?>" readonly>
        <input type="text" placeholder="пароль" name="password" value="<?= $item['password']?>">
        <input type="text" placeholder="фамилия" name="surname" value="<?= $item['surname']?>">
        <input type="text" placeholder="имя" name="name" value="<?= $item['name']?>">
        <input type="text" placeholder="отчество" name="patronymic" value="<?= $item['patronymic']?>">
        <input type="email" placeholder="почта" name="email" value="<?= $item['email']?>">

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

        <select name="position">
            <?php foreach ($args['position'] as $position):?>
            <?php if($item['position'] == $position['$id']):?>
               <option selected value = '<?= $position['id']?>'><?= $position['name']?></option>
            <?php else: ?>
               <option value = '<?= $position['id']?>'><?= $position['name']?></option>
            <?php endif ?>
            <?php endforeach;?>
        </select>

        <select name="rights">
            <?php foreach ($args['rights'] as $rights):?>
                <?php if($item['rights'] == $rights['id']):?>
                    <option selected value = '<?= $rights['id']?>'><?= $rights['name']?></option>
                <?php else: ?>
                    <option value = '<?= $rights['id']?>'><?= $rights['name']?></option>
                <?php endif ?>
            <?php endforeach;?>
        </select>
        <br/> <br/> <br/>

        <input type="file" name="photo" value="<?= $item['foto']?>">
        <img src="../upload/img/<?= $item['foto']?>">
        <input type="submit" value="Удалить" name="delete">
        <input type="submit" value="Изменить" name="submit">
    </form>
<?php endforeach;?>


