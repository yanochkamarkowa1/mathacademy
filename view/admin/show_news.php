<h2>Редактирование новости</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Дата</td>
            <td><input type="text" name="data" value="<?=$item['data']?>"></td>
        </tr>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['name']?>"></td>
        </tr>
        <tr>
            <td>Фото</td>
            <td>
                <?if(file_exists($_SERVER['DOCUMENT_ROOT']. '/upload/img/'.$item['foto'])):?>
                <img src="/upload/img/<?=$item['foto']?>">
                <?else:?>
                    Нет фото
                <?endif;?>
                <input type="hidden" name="oldFoto" value="<?=$item['foto']?>">
                <input type="file" name="foto">
            </td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea type="text" name="description"><?=$item['description']?></textarea></td>
        </tr>
        <tr>
            <td>Текст</td>
            <td><textarea type="text" name="content"><?=$item['content']?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button class="element__save" data-url="/admin/save_news/?id=<?=$item['id']?>">Сохранить</button>
            <button class="element__delete" data-url="/admin/delete_news/?id=<?=$item['id']?>">Удалить</button></td>
        </tr>
    </table>
</form>