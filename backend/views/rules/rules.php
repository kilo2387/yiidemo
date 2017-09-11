<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/11
 * Time: 15:32
 */
?>

<form action="rules/update" method="post">
<!--    <input name="_csrf" value="--><?//= \Yii::$app->request->csrfToken; ?><!--" type="hidden">-->
title:<input name="Remind[title]" value=""/>
content:<input name="Remind[content]" value=""/>
url:<input name="url" value=""/>
stauts:<select name="status">
    <option value=""></option>
    <option value="1">一一一</option>
    <option value="2">二二二</option>
    <option value="3">三三三</option>
    <option value="4">四四四</option>
</select>
<button type="submit">提交</button>
</form>


