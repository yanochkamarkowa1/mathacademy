<h2>Редактирование ученика</h2>
<form class="element__form">
    <table>
        <tr>
            <td>Фамилия</td>
            <td><input type="text" name="surname" value="<?=$item['student']['surname']?>"></td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" name="name" value="<?=$item['student']['name']?>"></td>
        </tr>
        <tr>
            <td>Отчество</td>
            <td><input type="text" name="patronymic" value="<?=$item['student']['patronymic']?>"></td>
        </tr>
        <tr>
        <tr>
            <td>Место учёбы</td>
            <td>
                <select name="place_work">
                    <?foreach ($item['place_work'] as $placeWork):?>
                        <option value="<?=$placeWork['id']?>" <?if($item['student']['place_work_id'] == $placeWork['id']):?> selected<?endif;?>
                        ><?=$placeWork['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Город</td>
            <td>
                <select name="location">
                    <?foreach ($item['location'] as $location):?>
                        <option value="<?=$location['id']?>" <?if($item['student']['location_id'] == $location['id']):?> selected<?endif;?>
                        ><?=$location['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Класс</td>
            <td>
                <select name="classes">
                    <?foreach ($item['classes'] as $class):?>
                        <option value="<?=$class['id']?>" <?if($item['student']['classes_id'] == $class['id']):?> selected<?endif;?>
                        ><?=$class['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?if(isset($item['student']['id'])):?>
                <button class="element__save" data-url="/admin/save_student/?id=<?=$item['student']['id']?>">Сохранить</button>
                <button class="element__delete" data-url="/admin/delete_student/?id=<?=$item['student']['id']?>">Удалить</button>
            <?else:?>
                <button class="element__save" data-url="/admin/add_student/">Добавить</button>
            <?endif;?>
            </td>
        </tr>
    </table>
</form>