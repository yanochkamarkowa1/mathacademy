<div class="table">
    <h1>Таблица мест работы</h1>
    <table>
    <tr>
        <td>ID</td>
        <td>Название</td>
        <td>Email</td>
        <td>Адресс</td>
        <td>Редактирование</td>
    </tr>
    <?foreach ($list as $item):?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['name']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['address']?></td>
            <td><button class="show__popup" data-url="/admin/show_place_work/?id=<?=$item['id']?>">Изменить</button></td>
        </tr>
    <?endforeach;?>
        <tr>
            <td colspan="4"></td>
            <td><button>Добавить</button></td>
        </tr>
    </table>
</div>