<?php foreach ($args as $item):?>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="id" name="id" value="<?= $item['id']?>" readonly>
      <input type="text" placeholder="имя" name="name" value="<?= $item['name']?>">

      <input type="text" placeholder="краткое пояснение" name="description" value="<?= $item['description']?>">
      <input type="text" placeholder="контент" name="content" value="<?= htmlspecialchars($item['content'])?>">
      <input type="file" name="photo" value="<?= $item['foto']?>">
      <img src="../upload/img/<?= $item['foto']?>">
      <input type="submit" value="Удалить" name="delete">
      <input type="submit" value="Изменить" name="submit">
    </form>
<?php endforeach;?>