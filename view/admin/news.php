<div class="table">
    <h1>Таблица новостей</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Дата</td>
            <td>Назваие</td>
            <td>Редактирование</td>
        </tr>
        <?foreach ($list as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['data']?></td>
                <td><?=$item['name']?></td>
                <td><button class="show__popup" data-url="/admin/show_news/?id=<?=$item['id']?>">Изменить</button></td>
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