<h2>Редактирование местоположения</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" value="<?=$item['location']['name']?>"></td>
        </tr>
        <tr>
            <td>Тип</td>
            <td>
                <select name="type">
                    <?foreach ($item['types'] as $type):?>
                        <option value="<?=$type['id']?>" <?if($item['location']['type_id'] == $type['id']):?> selected<?endif;?>
                        ><?=$type['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="element__save" data-url="/admin/save_location/?id=<?=$item['location']['id']?>">Сохранить</button>
            <button class="element__delete" data-url="/admin/delete_location/?id=<?=$item['location']['id']?>">Удалить</button></td>
        </tr>
    </table>
</form>