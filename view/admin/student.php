<div class="table">
    <h1>Таблица учащихся</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Отчество</td>
            <td>Школа</td>
            <td>Класс</td>
            <td>Редактирование</td>
        </tr>
        <?foreach ($list as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['surname']?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['patronymic']?></td>
                <td><?=$item['place_work']?></td>
                <td><?=$item['classes']?></td>
                <td><button class="show__popup" data-url="/admin/show_student/?id=<?=$item['id']?>">Изменить</button></td>
            </tr>
        <?endforeach;?>
        <tr>
            <td colspan="6"></td>
            <td><button class="show__popup" data-url="/admin/show_student/">Добавить</button></td>
        </tr>
    </table>
</div>