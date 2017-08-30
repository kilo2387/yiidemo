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


        <SCRIPT src="../date/jquery.min.js" type="text/javascript"></SCRIPT>
    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<!--    <SCRIPT src="../date/bootstrap.min.js" type="text/javascript"></SCRIPT>-->
<!--    <link rel="stylesheet" href="../assets/b794defa/css/theme-default.css">-->
<!--    <LINK href="../date/bootstrap.css" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="./css/theme-white.css">-->
    <!--<link rel="stylesheet" href="./css/theme-brown.css">-->

    <!--&lt;!&ndash;integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"&ndash;&gt;-->
    <!--&lt;!&ndash;crossorigin="anonymous">&ndash;&gt;-->
<!--    <script type="text/javascript" src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->


<!--    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->


</head>
<body>

<div style="border:1px solid royalblue;width: 500px; height:500px; margin: 0 auto">
<!--    <div class="input-group col-md-6" style="float: right">-->
<!--        <input type="text" id="begin" class="form-control col-md-1 datepicker">-->
<!--        <div class="input-group-addon">-->
<!--            <span class="glyphicon glyphicon-th"></span>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="input-group col-md-6" style="float: right">-->
<!--        <input type="text" id="end" class="form-control col-md-1 datepicker">-->
<!--        <div class="input-group-addon">-->
<!--            <span class="glyphicon glyphicon-th"></span>-->
<!--        </div>-->
<!--    </div>-->

    <div class="well">
        <div id="datetimepicker1" class="input-append">
            <input id="begin" class="datepicker" type="text"/>
            <span class="add-on">
              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
    </div>
    <div class="well">
        <div id="datetimepicker1" class="input-append">
            <input id="end" class="datepicker" type="text"/>
            <span class="add-on">
              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
    </div>
<!--    <div class="well">-->
<!--        <div id="datetimepicker1" class="input-append date">-->
<!--            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>-->
<!--<!---->-->
<!--            <div class="input-group-addon">-->
<!--                <span class="glyphicon glyphicon-th"></span>-->
<!--            </div>-->
<!--    </span>-->
<!--        </div>-->
<!--    </div>-->

    datetimepicker1

</div>


</body>

<!--<script type="text/javascript" src="../assets/b794defa/js/bootstrap-datepicker.js"></script>-->

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
                language: "zh-CN",
                startView: 0,
                format: "yyyy-mm-dd",
                endDate: new Date(new Date().getTime() - 24 * 1 * 3600000)
            }).on('changeDate', function (ev) {
            if (ev.date) {
                $('#end').datepicker('setStartDate', new Date(ev.date.valueOf()))
            } else {
                $('#end').datepicker('setStartDate', null);
            }
        });

        $('#end').datepicker(
            {
                language: "zh-CN",
                startView: 0,
                format: "yyyy-mm-dd",
                endDate: new Date(new Date().getTime() - 24 * 1 * 3600000)
            }).on('changeDate', function (ev) {
            if (ev.date) {
                $('#begin').datepicker('setEndDate', new Date(ev.date.valueOf()))
            } else {
                $('#begin').datepicker('setEndDate', new Date());
            }

        });
</script>



<!--    <script type="text/javascript" src="../assets/b794defa/js/bootstrap-datetimepicker.min.js"></script>-->
<script type="text/javascript" src="../assets/b794defa/js/bootstrap-datepicker.js"></script>
</html>
