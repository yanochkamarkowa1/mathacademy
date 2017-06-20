<h2>Редактирование пользователя</h2>
<form class="element__form">
    <table>

        <?if(empty($item['user']['login'])):?>-
        <tr>
            <td>Логин</td>
            <td><input type="text" name="login""></td>
        </tr>
        <?endif;?>
        <tr>
            <td>Фамилия</td>
            <td><input type="text" name="surname" value="<?=$item['user']['surname']?>"></td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" name="name" value="<?=$item['user']['name']?>"></td>
        </tr>
        <tr>
            <td>Отчество</td>
            <td><input type="text" name="patronymic" value="<?=$item['user']['patronymic']?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?=$item['user']['email']?>"></td>
        </tr>
        <tr>
            <td>Фото</td>
            <td>
                <?if(file_exists($_SERVER['DOCUMENT_ROOT']. '/upload/img/'.$item['user']['foto']) && $item['user']['foto']):?>
                    <img src="/upload/img/<?=$item['user']['foto']?>">
                <?else:?>
                    Нет фото
                <?endif;?>
                <div>
                    <select name="foto">
                        <?foreach ($item['images'] as $image):?>
                            <option value="<?=$image['name']?>" <?if($item['user']['foto_name'] == $image['name']):?>selected<?endif;?>><?=$image['name']?></option>
                        <?endforeach;?>
                    </select>
                    <a href="/admin/images/">Просмотреть и добавить фото</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
        <tr>
            <td>Место работы</td>
            <td>
                <select name="place_work">
                    <?foreach ($item['place_work'] as $placeWork):?>
                        <option value="<?=$placeWork['id']?>" <?if($item['user']['place_work_id'] == $placeWork['id']):?> selected<?endif;?>
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
                        <option value="<?=$location['id']?>" <?if($item['user']['location_id'] == $location['id']):?> selected<?endif;?>
                        ><?=$location['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Должность</td>
            <td>
                <select name="position">
                    <?foreach ($item['position'] as $position):?>
                        <option value="<?=$position['id']?>" <?if($item['user']['position_id'] == $position['id']):?> selected<?endif;?>
                        ><?=$position['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Права</td>
            <td>
                <select name="privilege">
                    <?foreach ($item['privilege'] as $privilege):?>
                        <option value="<?=$privilege['id']?>" <?if($item['user']['privilege_id'] == $privilege['id']):?> selected<?endif;?>
                        ><?=$privilege['name']?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?if(isset($item['user']['login'])):?>
                <button class="element__save" data-url="/admin/save_user/?login=<?=$item['user']['login']?>">Сохранить</button>
                <button class="element__delete" data-url="/admin/delete_user/?login=<?=$item['user']['login']?>">Удалить</button>
            <?else:?>
                <button class="element__save" data-url="/admin/add_user/">Добавить</button>
            <?endif;?>
            </td>
        </tr>
    </table>
</form>