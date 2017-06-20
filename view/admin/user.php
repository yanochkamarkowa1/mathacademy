<div class="table">
    <h1>Таблица пользователей</h1>
    <table>
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Отчество</td>
            <td>Email</td>
            <td>Права</td>
            <td>Место работы</td>
            <td>Должность</td>
            <td>Редактирование</td>
        </tr>
        <?foreach ($list as $item):?>
            <tr>
                <td><?=$item['surname']?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['patronymic']?></td>
                <td><?=$item['email']?></td>
                <td><?=$item['rights']?></td>
                <td><?=$item['place_work']?></td>
                <td><?=$item['position']?></td>
                <td><button class="show__popup" data-url="/admin/show_user/?login=<?=$item['login']?>">Изменить</button></td>
            </tr>
        <?endforeach;?>
        <tr>
            <td colspan="7"></td>
            <td><button class="show__popup" data-url="/admin/show_user/">Добавить</button></td>
        </tr>
    </table>
</div>