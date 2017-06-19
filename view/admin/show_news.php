<h2>Редактирование новости</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Дата</td>
            <td><input type="text" name="data" value="<?=$item['news']['data']?>"></td>
        </tr>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['news']['name']?>"></td>
        </tr>
        <tr>
            <td>Фото</td>
            <td>
                <?if(file_exists($_SERVER['DOCUMENT_ROOT']. '/upload/img/'.$item['news']['foto']) && $item['news']['foto']):?>
                    <img src="/upload/img/<?=$item['news']['foto']?>">
                <?else:?>
                    Нет фото
                <?endif;?>
                <div>
                    <select name="foto">
                        <?foreach ($item['images'] as $image):?>
                            <option value="<?=$image['name']?>" <?if($item['news']['foto_name'] == $image['name']):?>selected<?endif;?>><?=$image['name']?></option>
                        <?endforeach;?>
                    </select>
                    <a href="/admin/images/">Просмотреть и добавить фото</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea type="text" name="description"><?=$item['news']['description']?></textarea></td>
        </tr>
        <tr>
            <td>Текст</td>
            <td><textarea type="text" name="content"><?=$item['news']['content']?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button class="element__save" data-url="/admin/save_news/?id=<?=$item['news']['id']?>">Сохранить</button>
            <button class="element__delete" data-url="/admin/delete_news/?id=<?=$item['news']['id']?>">Удалить</button></td>
        </tr>
    </table>
</form>