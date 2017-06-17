<?php foreach ($args as $item):?>
    <form action="" method="post" ">
    <input type="text" placeholder="id" name="id" value="<?= $item['id'] ?>" readonly>
    <input type="text" placeholder="название" name="name" value="<?= $item['name'] ?>">
    <input type="text" placeholder="почта" name="email" value="<?= $item['email'] ?>">
    <input type="text"  placeholder="адрес" name="address" value="<?= $item['address'] ?>">
    <input type="submit" value="изменить" name="submit">
    <input type="submit" value="удалить" name="delete">
</form>
<?php endforeach;?>
