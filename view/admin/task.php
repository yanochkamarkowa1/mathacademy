<?php foreach ($args['task'] as $item):?>
    <form action="" method="post" >

        <input type="text" placeholder="id" name="id" value="<?= $item['id']?>" readonly>
        <select name="category">
            <?php foreach ($args['category'] as $category):?>
                <?php if($item['category'] == $category['id']):?>
                    <option selected value = '<?= $category['id'] ?>'><?= $category['name'] ?></option>
                <?php else:?>
                    <option value = '<?= $category['id'] ?>'><?= $category['name'] ?></option>
                <?php endif;?>
            <?php endforeach;?>
        </select>
        <input type="text" placeholder="имя" name="name" value="<?= $item['name']?>">
        <input type="text" placeholder="контент" name="content" value="<?= htmlspecialchars($item['content'])?>">
        <input type="text"  placeholder="ответ" name="solution" value="<?= htmlspecialchars($item['solution'])?>">
        <input type="submit" value="Удалить" name="delete">
        <input type="submit" value="Изменить" name="submit">

    </form>
<?php endforeach;?>
