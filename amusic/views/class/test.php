<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/29 1:11.
 *
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/b794defa/css/theme-default.css">
    <!--<link rel="stylesheet" href="./css/theme-white.css">-->
    <!--<link rel="stylesheet" href="./css/theme-brown.css">-->

    <!--&lt;!&ndash;integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"&ndash;&gt;-->
    <!--&lt;!&ndash;crossorigin="anonymous">&ndash;&gt;-->
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->


    <!--<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

    <!--<style>-->
    <!--div.datepicker {-->
    <!--padding: 4px;-->
    <!-- -moz-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
    <!-- -webkit-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
    <!--box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
    <!--}-->
    <!--div.datepicker > div {-->
    <!--display: none;-->
    <!--}-->
    <!--div.datepicker table {-->
    <!--width: 100%;-->
    <!--margin: 0;-->
    <!--}-->
    <!--div.datepicker td,-->
    <!--div.datepicker th {-->
    <!--text-align: center;-->
    <!--width: 20px;-->
    <!--height: 20px;-->
    <!--}-->
    <!--div.datepicker td.day:hover {-->
    <!--background: #F5F5F5;-->
    <!--cursor: pointer;-->
    <!--}-->
    <!--div.datepicker td.day.disabled {-->
    <!--color: #CCC;-->
    <!--}-->
    <!--div.datepicker td.old,-->
    <!--div.datepicker td.new {-->
    <!--color: #999;-->
    <!--}-->
    <!--div.datepicker td.active,-->
    <!--div.datepicker td.active:hover {-->
    <!--background: #1b1e24;-->
    <!--color: #fff;-->
    <!-- -moz-border-radius: 3px;-->
    <!-- -webkit-border-radius: 3px;-->
    <!--border-radius: 3px;-->
    <!--}-->
    <!--div.datepicker td span {-->
    <!--display: block;-->
    <!--width: 31%;-->
    <!--height: 54px;-->
    <!--line-height: 54px;-->
    <!--float: left;-->
    <!--margin: 2px;-->
    <!--cursor: pointer;-->
    <!--}-->
    <!--div.datepicker td span:hover {-->
    <!--background: #F5F5F5;-->
    <!--}-->
    <!--div.datepicker td span.active {-->
    <!--background: #1b1e24;-->
    <!--color: #fff;-->
    <!-- -moz-border-radius: 3px;-->
    <!-- -webkit-border-radius: 3px;-->
    <!--border-radius: 3px;-->
    <!--}-->
    <!--div.datepicker td span.old {-->
    <!--color: #999;-->
    <!--}-->
    <!--div.datepicker th.switch {-->
    <!--width: 145px;-->
    <!--}-->
    <!--div.datepicker th.next,-->
    <!--div.datepicker th.prev {-->
    <!--font-size: 12px;-->
    <!--}-->
    <!--div.datepicker thead tr:first-child th {-->
    <!--cursor: pointer;-->
    <!--padding: 8px 0px;-->
    <!--}-->
    <!--div.datepicker thead tr:first-child th:hover {-->
    <!--background: #F5F5F5;-->
    <!-- -moz-border-radius: 3px;-->
    <!-- -webkit-border-radius: 3px;-->
    <!--border-radius: 3px;-->
    <!--}-->
    <!--.input-append.date .add-on i,-->
    <!--.input-prepend.date .add-on i {-->
    <!--display: block;-->
    <!--cursor: pointer;-->
    <!--width: 16px;-->
    <!--height: 16px;-->
    <!--}-->
    <!--.datepicker.dropdown-menu:after,-->
    <!--.datepicker.dropdown-menu:before {-->
    <!--left: 16px;-->
    <!--}-->
    <!--.datepicker.datepicker-orient-left.dropdown-menu:after,-->
    <!--.datepicker.datepicker-orient-left.dropdown-menu:before {-->
    <!--left: auto;-->
    <!--right: 16px;-->
    <!--}-->
    <!--</style>-->
</head>
<body>

<div style="border:1px solid royalblue;width: 200px; height:500px; margin: 0 auto">
    <div class="input-group col-md-6" style="float: right">
        <input type="text" id="begin" class="form-control col-md-1 datepicker">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>

    <div class="input-group col-md-6" style="float: right">
        <input type="text" id="end" class="form-control col-md-1 datepicker">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
</div>
</body>

<script type="text/javascript" src="../assets/b794defa/js/bootstrap-datepicker.js"></script>
<!--<script type="text/javascript" src="./datepicker/js/bootstrap-select.js"></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.maskedinput.min.js'></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.maskedinput.min.js'></script>-->

<!--<script type='text/javascript' src='./datepicker/js/jquery.validationEngine-en.js'></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.validationEngine.js'></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.validate.js'></script>-->

<!--<script type="text/javascript" src="./datepicker/js/bootstrap-datepicker.js"></script>-->
<!--<script type="text/javascript" src="./datepicker/js/bootstrap-select.js"></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.maskedinput.min.js'></script>-->
<!--<script type='text/javascript' src='./datepicker/js/jquery.maskedinput.min.js'></script>-->

<!--<script type="text/javascript" src="./datepicker/js/boss/util.js"></script>-->
<!--<script type="text/javascript" src="./datepicker/js/boss/diff/diff.js"></script>-->


<script type="text/javascript">
    $('#begin').datepicker(
        {
            language:  "zh-CN",
            startView: 0,
            format: "yyyy-mm-dd",
            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
        }).on('changeDate', function(ev){
        if(ev.date){
            $('#end').datepicker('setStartDate', new Date(ev.date.valueOf()))
        }else{
            $('#end').datepicker('setStartDate',null);
        }
    })

    $('#end').datepicker(
        {
            language:  "zh-CN",
            startView:0,
            format: "yyyy-mm-dd",
            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
        }).on('changeDate', function(ev){
        if(ev.date){
            $('#begin').datepicker('setEndDate', new Date(ev.date.valueOf()))
        }else{
            $('#begin').datepicker('setEndDate',new Date());
        }

    })
</script>
</html>
