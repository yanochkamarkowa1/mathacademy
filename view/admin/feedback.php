<div class="table">
    <h1>Таблица обратной связи</h1>
    <table>
    <tr>
        <td>ID</td>
        <td>Имя</td>
        <td>Email</td>
        <td>Сообщение</td>
        <td>Дата</td>
        <td>Редактирование</td>
    </tr>
    <?foreach ($list as $item):?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['full_name']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['message']?></td>
            <td><?=$item['data']?></td>
            <td><button class="element__delete" data-url="/admin/delete_feedback/?id=<?=$item['id']?>">Удалить</button></td>
        </tr>
    <?endforeach;?>
    </table>
</div>