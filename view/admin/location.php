<div class="table">
    <h1>Таблица местоположений</h1>
    <table>
    <tr>
        <td>ID</td>
        <td>Название</td>
        <td>Тип</td>
        <td>Редактирование</td>
    </tr>
    <?foreach ($list as $item):?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['name']?></td>
            <td><?=$item['type']?></td>
            <td><button class="location" data-id="<?=$item['id']?>">Изменить</button></td>
        </tr>
    <?endforeach;?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Добавить</button></td>
        </tr>
    </table>
</div>