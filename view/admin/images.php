<div class="table">
    <h1>Таблица изображений</h1>
    <table>
        <tr>
            <td>Имя</td>
            <td>Имя файла</td>
            <td>Изображение</td>
            <td>Редактирование</td>
        </tr>
        <?foreach ($list as $item):?>
            <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['filename']?></td>
                <td><img src="/upload/img/<?=$item['filename']?>"</td>
                <td><button class="show__popup" data-url="/admin/show_image/?id=<?=$item['id']?>">Изменить</button></td>
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