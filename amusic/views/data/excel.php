<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/31 23:40.
 *
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>excel导出模板</title>
</head>
<body>
<table class="table table-bordered" border="1" cellspacing="0" cellpadding="0">
    <thead>
<!--    <foreach name="title" item="value">-->
<!--        <th style="background-color: #bfd7ff">{$value}</th>-->
<!--    </foreach>-->
    </thead>
    <tbody>

    <?php foreach ($data as $values): ?>
<!--    <foreach name="data" item="values">-->
        <tr>
        <?php foreach ($values as $value): ?>
                <td style="vnd.ms-excel.numberformat:@; border-color: #99ee99"><?= $value ?></td>
        <?php endforeach; ?>
        </tr>
<!--    </foreach>-->
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
