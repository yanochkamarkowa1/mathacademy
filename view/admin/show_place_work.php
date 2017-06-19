<h2>Редактирование места работы</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['name']?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?=$item['email']?>"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" name="address" value="<?=$item['address']?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="element__save" data-url="/admin/save_place_work/?id=<?=$item['id']?>">Сохранить</button>
            <button class="element__delete" data-url="/admin/delete_place_work/?id=<?=$item['id']?>">Удалить</button></td>
        </tr>
    </table>
</form>