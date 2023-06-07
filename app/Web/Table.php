<h1>Продукты</h1>
<form action="table/delete" method="post">
    <input type="submit" value="Удалить все данные">
</form>
<?php $data=(new \app\Models\Products)->all() ?>
<table>
    <tr>
        <th>Код</th>
        <th>Наименование</th>
        <th>Уровень 1</th>
        <th>Уровень 2</th>
        <th>Уровень 3</th>
        <th>Цена</th>
        <th>ЦенаСП</th>
        <th>Количество</th>
        <th>Поля свойств</th>
        <th>Совместные покупки</th>
        <th>Единица измерения</th>
        <th>Картинка</th>
        <th>Выводить на главной</th>
        <th>Описание</th>
    </tr>
    <?php foreach ($data as $item) { ?>
    <?php /** @var app\Models\Products $item */ ?>
        <tr>
            <td><?= $item->code ?></td>
            <td><?= $item->name ?></td>
            <td><?= $item->level_1 ?></td>
            <td><?= $item->level_2 ?></td>
            <td><?= $item->level_3 ?></td>
            <td><?= $item->price ?></td>
            <td><?= $item->price_sp ?></td>
            <td><?= $item->quantity ?></td>
            <td><?= $item->property_fields ?></td>
            <td><?= $item->joint_purchases ?></td>
            <td><?= $item->unit_measurement ?></td>
            <td><?= $item->picture ?></td>
            <td><?= $item->display_main ? 'Да' : 'Нет' ?></td>
            <td><?= $item->description ?></td>
        </tr>
    <?php } ?>
</table>