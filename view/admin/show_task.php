<h2>Редактирование задачи</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['task']['name']?>"></td>
        </tr>
        <tr>
            <td>Категория</td>
            <td>
                <select name="category">
                    <?foreach ($item['categories'] as $category):?>
                        <option value="<?=$category['id']?>" <?if($item['task']['category_id'] == $category['id']):?> selected<?endif;?>
                        ><?=$category['name_category']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Задача</td>
            <td><textarea type="text" name="content"><?=$item['task']['content']?></textarea></td>
        </tr>
        <tr>
            <td>Решение</td>
            <td><textarea type="text" name="solution"><?=$item['task']['solution']?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><a target="_blank" href="/admin/images/">Просмотреть и добавить изображения</a></td>
        </tr>
        <tr>
            <td colspan="2">
            <?if(isset($item['task']['id'])):?>
                <button class="element__save" data-url="/admin/save_task/?id=<?=$item['task']['id']?>">Сохранить</button>
                <button class="element__delete" data-url="/admin/delete_task/?id=<?=$item['task']['id']?>">Удалить</button>
            <?else:?>
                <button class="element__save" data-url="/admin/add_task/">Добавить</button>
            <?endif;?>
            </td>
        </tr>
    </table>
</form>