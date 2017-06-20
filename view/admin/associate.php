<div class="table non-last">
    <h1>Таблица категорий задач</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
        </tr>
        <?foreach ($category_task as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name_category']?></td>
                </tr>
        <?endforeach;?>
    </table>
</div>
<div class="table non-last">
    <h1>Таблица классов</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
        </tr>
        <?foreach ($classes as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
            </tr>
        <?endforeach;?>
    </table>
</div>
<div class="table non-last">
    <h1>Таблица должностей</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
        </tr>
        <?foreach ($position as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
            </tr>
        <?endforeach;?>
    </table>
</div>
<div class="table non-last">
    <h1>Таблица прав</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
        </tr>
        <?foreach ($privilege as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
            </tr>
        <?endforeach;?>
    </table>
</div>
<div class="table non-last">
    <h1>Таблица типов местоположений</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Имя</td>
        </tr>
        <?foreach ($type as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
            </tr>
        <?endforeach;?>
    </table>
</div>