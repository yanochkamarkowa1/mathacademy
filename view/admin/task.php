<div class="table">
    <h1>Таблица задач</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Категория</td>
            <td>Название</td>
            <td>Редактирование</td>
        </tr>
        <?foreach ($list as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name_category']?></td>
                <td><?=$item['name']?></td>
                <td><button class="location" data-id="<?=$item['id']?>">Изменить</button></td>
            </tr>
        <?endforeach;?>
        <tr>
            <td colspan="3"></td>
            <td><button>Добавить</button></td>
        </tr>
    </table>
</div>