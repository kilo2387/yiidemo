<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>++</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<!--    <script src="http://music.ssting.com.cn/assets/b794defa/js/bootstrap-datepicker.js"></script>-->

<!--    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>-->
<!--    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.zh-CN.min.js"></script>-->
    <!--<script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.js"></script>-->
    <!--<script src="https://cdn.bootcss.com/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.js"></script>-->


    <!-- 自己的 -->
    <!--<link rel="stylesheet" href="http://music.ssting.com.cn/assets/b794defa/css/bootstrap.min.css" />-->

    <!-- 下载的 bootstrap3 -->
    <!--<link rel="stylesheet" href="./public/bootstrap3/css/bootstrap.min.css" />-->
    <!--<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- CDN的 -->
    <!--<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap-grid.css" rel="stylesheet">-->
    <!--<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">-->

    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">


</head>

<style>
    .input-group-addon {
        border-color: #1b1e24;
        background-color: #1b1e24;
        font-size: 13px;
        padding: 0px 10px;
        line-height: 28px;
        color: #FFF;
        text-align: center;
        min-width: 36px;
    }
    div.datepicker {
        padding: 4px;
        -moz-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);
    }
    div.datepicker > div {
        display: none;
    }
    div.datepicker table {
        width: 100%;
        margin: 0;
    }
    div.datepicker td,
    div.datepicker th {
        text-align: center;
        width: 20px;
        height: 20px;
    }
    div.datepicker td.day:hover {
        background: #F5F5F5;
        cursor: pointer;
    }
    div.datepicker td.day.disabled {
        color: #CCC;
    }
    div.datepicker td.old,
    div.datepicker td.new {
        color: #999;
    }
    div.datepicker td.active,
    div.datepicker td.active:hover {
        background: #1b1e24;
        color: #fff;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
    }
    div.datepicker td span {
        display: block;
        width: 31%;
        height: 54px;
        line-height: 54px;
        float: left;
        margin: 2px;
        cursor: pointer;
    }
    div.datepicker td span:hover {
        background: #F5F5F5;
    }
    div.datepicker td span.active {
        background: #1b1e24;
        color: #fff;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
    }
    div.datepicker td span.old {
        color: #999;
    }
    div.datepicker th.switch {
        width: 145px;
    }
    div.datepicker th.next,
    div.datepicker th.prev {
        font-size: 12px;
    }
    div.datepicker thead tr:first-child th {
        cursor: pointer;
        padding: 8px 0px;
    }
    div.datepicker thead tr:first-child th:hover {
        background: #F5F5F5;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
    }
    .input-append.date .add-on i,
    .input-prepend.date .add-on i {
        display: block;
        cursor: pointer;
        width: 16px;
        height: 16px;
    }
    .datepicker.dropdown-menu:after,
    .datepicker.dropdown-menu:before {
    left: 16px;
    }
    .datepicker.datepicker-orient-left.dropdown-menu:after,
    .datepicker.datepicker-orient-left.dropdown-menu:before {
    left: auto;
    right: 16px;
    }
    .datepicker-switch, .day, .dow {
    color: #000000;
    font-weight:bold
    }
</style>


<body>

<div class="col-md-2">
    <input id="begin"/>
</div>

<div class="col-md-2">
    <input id="end"/>
</div>

</body>
<script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">


    var bg = $('#begin');
    var end = $('#end');

//    bg.on('changeDate',function(ev,end){
//        end.datepicker('setStartDate', new Date(bg.val()));
//    });

    bg.on("changeDate",'',{name:end,id:"234",tel:"345"},callback)
    function callback(ev) {
        console.log(ev.data.name)
        ev.data.name.datepicker('setStartDate', new Date(bg.val()));
    }


    $('#begin').datepicker(
        {
            language:  "zh-CN",
            startView:0,
            format: "yyyy-mm-dd",

            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000),
            dates:'yyyy-mm-dd'
        }).on('changeDate', function(ev){

           if(ev.date){
    //            $('#end').datepicker('setStartDate', new Date(ev.date.valueOf()))

           }else{

               $('#end').datepicker('setStartDate',null);
           }
       })

    $('#end').datepicker(
        {
            language:  "zh-CN",
            startView: 0,
            format: "yyyy-mm-dd",
            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
        }).on('changeDate', function(ev){

            if(ev.date){
                            $(this).datepicker('setStartDate', new Date(ev.date.valueOf()))
                console.log(bg.datepicker().startDate)
            }else{

//                $('#end').datepicker('setStartDate',null);
            }
        })

//    bg.on('changeDate', function(ev, end){
//        if(ev.date){
////            $('#end').datepicker('setStartDate', new Date(ev.date.valueOf()))
//            end.setStartDate(new Date(ev.date.valueOf()))
//        }else{
//
//            $('#end').datepicker('setStartDate',null);
//        }
//    })
//
//var btime = '2017-08-04';
//    console.log(    new Date(   '2017-08-04'  )  );
    /*var bg = $('#begin').datepicker({
        language:  "zh-CN",
        startView:0,
        format: "yyyy-mm-dd",

        endDate:new Date(new Date().getTime() - 24 * 1 * 3600000),
        dates:'yyyy-mm-dd'
    });


    var end = $('#end').datepicker({
        language:  "zh-CN",
        startView:0,
        format: "yyyy-mm-dd",

        endDate:new Date(new Date().getTime() - 24 * 1 * 3600000),
        dates:'yyyy-mm-dd'
    });

    end.on('changeDate',function (ev) {
        bg.datepicker('setEndDate', new Date(ev.date.valueOf()))
    });
    bg.on('changeDate',function (ev) {
        end.datepicker('setStartDate', new Date(ev.date.valueOf()))
    });*/

</script>
</html>