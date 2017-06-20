<h2>Редактирование изображения</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['name']?>"></td>
        </tr>
        <tr>
            <td>Файл</td>
            <td>
                <input type="file" name="foto">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button class="element__save" data-url="/admin/add_image/">Добавить</button>
            </td>
        </tr>
    </table>
</form>