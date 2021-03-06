<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 21:06.
 *
 */
use yii\grid\GridView;

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- begin datepicker -->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!--    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="../H-ui.admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../H-ui.admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="../H-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <!--<link rel="stylesheet" type="text/css" href="../H-ui.admin/static/h-ui.admin/skin/default/skin.css" id="skin" />-->
    <link rel="stylesheet" type="text/css" href="../H-ui.admin/static/h-ui.admin/css/style.css" />




    <!--[if IE 6]>
    <script type="text/javascript" src="../H-ui.admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="../H-ui.admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="../H-ui.admin/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="../H-ui.admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="../H-ui.admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <!--<script type="text/javascript" src="../H-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>-->
    <!--<script type="text/javascript" src="../H-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>-->


    <!--<script type="text/javascript" src="../H-ui.admin/lib/laypage/1.2/laypage.js"></script>-->
    <script type="text/javascript" src="../assets/b794defa/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../assets/b794defa/css/theme-default.css">
<!--    <style>-->
<!--        .input-group-addon {-->
<!--            border-color: #1b1e24;-->
<!--            background-color: #1b1e24;-->
<!--            font-size: 13px;-->
<!--            padding: 0px 10px;-->
<!--            line-height: 28px;-->
<!--            color: #FFF;-->
<!--            text-align: center;-->
<!--            min-width: 36px;-->
<!--        }-->
<!--        div.datepicker {-->
<!--            padding: 4px;-->
<!--            -moz-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
<!--            -webkit-box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
<!--            box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);-->
<!--        }-->
<!--        div.datepicker > div {-->
<!--            display: none;-->
<!--        }-->
<!--        div.datepicker table {-->
<!--            width: 100%;-->
<!--            margin: 0;-->
<!--        }-->
<!--        div.datepicker td,-->
<!--        div.datepicker th {-->
<!--            text-align: center;-->
<!--            width: 20px;-->
<!--            height: 20px;-->
<!--        }-->
<!--        div.datepicker td.day:hover {-->
<!--            background: #F5F5F5;-->
<!--            cursor: pointer;-->
<!--        }-->
<!--        div.datepicker td.day.disabled {-->
<!--            color: #CCC;-->
<!--        }-->
<!--        div.datepicker td.old,-->
<!--        div.datepicker td.new {-->
<!--            color: #999;-->
<!--        }-->
<!--        div.datepicker td.active,-->
<!--        div.datepicker td.active:hover {-->
<!--            background: #1b1e24;-->
<!--            color: #fff;-->
<!--            -moz-border-radius: 3px;-->
<!--            -webkit-border-radius: 3px;-->
<!--            border-radius: 3px;-->
<!--        }-->
<!--        div.datepicker td span {-->
<!--            display: block;-->
<!--            width: 31%;-->
<!--            height: 54px;-->
<!--            line-height: 54px;-->
<!--            float: left;-->
<!--            margin: 2px;-->
<!--            cursor: pointer;-->
<!--        }-->
<!--        div.datepicker td span:hover {-->
<!--            background: #F5F5F5;-->
<!--        }-->
<!--        div.datepicker td span.active {-->
<!--            background: #1b1e24;-->
<!--            color: #fff;-->
<!--            -moz-border-radius: 3px;-->
<!--            -webkit-border-radius: 3px;-->
<!--            border-radius: 3px;-->
<!--        }-->
<!--        div.datepicker td span.old {-->
<!--            color: #999;-->
<!--        }-->
<!--        div.datepicker th.switch {-->
<!--            width: 145px;-->
<!--        }-->
<!--        div.datepicker th.next,-->
<!--        div.datepicker th.prev {-->
<!--            font-size: 12px;-->
<!--        }-->
<!--        div.datepicker thead tr:first-child th {-->
<!--            cursor: pointer;-->
<!--            padding: 8px 0px;-->
<!--        }-->
<!--        div.datepicker thead tr:first-child th:hover {-->
<!--            background: #F5F5F5;-->
<!--            -moz-border-radius: 3px;-->
<!--            -webkit-border-radius: 3px;-->
<!--            border-radius: 3px;-->
<!--        }-->
<!--        .input-append.date .add-on i,-->
<!--        .input-prepend.date .add-on i {-->
<!--            display: block;-->
<!--            cursor: pointer;-->
<!--            width: 16px;-->
<!--            height: 16px;-->
<!--        }-->
<!--        .datepicker.dropdown-menu:after,-->
<!--        .datepicker.dropdown-menu:before {-->
<!--            left: 16px;-->
<!--        }-->
<!--        .datepicker.datepicker-orient-left.dropdown-menu:after,-->
<!--        .datepicker.datepicker-orient-left.dropdown-menu:before {-->
<!--            left: auto;-->
<!--            right: 16px;-->
<!--        }-->
<!--        /*.datepicker-switch, .day, .dow {*/-->
<!--            /*color: #000000;*/-->
<!--            /*font-weight:bold*/-->
<!--        /*}*/-->
<!--    </style>-->
    <!-- end datepicker -->
    <title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
        <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span> 日期范围：
<!--        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="beginDate" class="input-text Wdate datepicker" style="width:120px;">-->
        -
<!--        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="endDate" class="input-text Wdate datepicker" style="width:120px;">-->

        <div class="input-group col-md-2" style="float: right">
            <input type="text" id="beginDate" class="form-control col-md-1 datepicker">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>

        <div class="input-group col-md-2" style="float: right">
            <input type="text" id="endDate" class="form-control col-md-1 datepicker">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>

        <input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
        <button name="" id="btn-search" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div class="mt-20">
<!--        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">-->
<!--            <thead>-->
<!--            <tr class="text-c">-->
<!--                <th width="25"><input type="checkbox" name="" value=""></th>-->
<!--                <th width="80">ID</th>-->
<!--                <th>标题</th>-->
<!--                <th width="80">分类</th>-->
<!--                <th width="80">来源</th>-->
<!--                <th width="120">更新时间</th>-->
<!--                <th width="75">浏览次数</th>-->
<!--                <th width="60">发布状态</th>-->
<!--                <th width="120">操作</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr class="text-c">-->
<!--                <td><input type="checkbox" value="" name=""></td>-->
<!--                <td>10001</td>-->
<!--                <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">资讯标题</u></td>-->
<!--                <td>行业动态</td>-->
<!--                <td>H-ui</td>-->
<!--                <td>2014-6-11 11:11:42</td>-->
<!--                <td>21212</td>-->
<!--                <td class="td-status"><span class="label label-success radius">已发布</span></td>-->
<!--                <td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>-->
<!--            </tr>-->
<!--            <tr class="text-c">-->
<!--                <td><input type="checkbox" value="" name=""></td>-->
<!--                <td>10002</td>-->
<!--                <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10002')" title="查看">资讯标题</u></td>-->
<!--                <td>行业动态</td>-->
<!--                <td>H-ui</td>-->
<!--                <td>2014-6-11 11:11:42</td>-->
<!--                <td>21212</td>-->
<!--                <td class="td-status"><span class="label label-success radius">草稿</span></td>-->
<!--                <td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_shenhe(this,'10001')" href="javascript:;" title="审核">审核</a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>-->
<!--            </tr>-->
<!--            </tbody>-->
<!--        </table>-->



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'class_material_id',
                'contentOptions'=>['width'=>'10%']
            ],
//                'title',
//                ['attribute'=>'authorName',
//                    'label'=>'作者',
//                    'value'=> 'author.nickname',
//                ],
////            'content:ntext',
//                'tags:ntext',
////            'status',
//                ['attribute'=>'status',
//                    'value'=>'status0.name',
//                    'filter'=>\common\models\Poststatus::find()->select(['name','id'])
//                        ->indexBy('id')->column()
//                ],
//                ['attribute'=>'create_time',
//                    'format'=>['date','php:Y-m-d H:i:s']
//                ],
//                ['attribute'=>'update_time',
//                    'format'=>['date','php:Y-m-d H:i:s']
//                ],
            // 'author_id',

            ['class' => 'yii\grid\ActionColumn',
            ]
//
        ],
        'summary'=>'',

    ]); ?>
    </div>
</div>



<!--<link rel="stylesheet" type="text/css" href="../assets/b794defa/css/bootstrap.css" />-->


<!--[if lt IE 9]>
<script type="text/javascript" src="../H-ui.admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="../H-ui.admin/lib/respond.min.js"></script>
<![endif]-->

<style>
    .breadcrumb{
        margin-bottom: 0;
    }
</style>

<script type="text/javascript">

//    $('#beginDate').datepicker(
//        {
//            language:  "zh-CN",
//            startView: 0,
//            format: "yyyy-mm-dd",
//            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
//        }).on('changeDate', function(ev){
//        if(ev.date){
//            $('#end').datepicker('setStartDate', new Date(ev.date.valueOf()))
//        }else{
//            $('#end').datepicker('setStartDate',null);
//        }
//    })
//
//    $('#endDate').datepicker(
//        {
//            language:  "zh-CN",
//            startView:0,
//            format: "yyyy-mm-dd",
//            endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
//        }).on('changeDate', function(ev){
//        if(ev.date){
//            $('#begin').datepicker('setEndDate', new Date(ev.date.valueOf()))
//        }else{
//            $('#begin').datepicker('setEndDate',new Date());
//        }
//
//    })

    $('#btn-search').click(function () {

        /**
         *
         * 获取url query参数数组
         */
        function get() { //
            var reg = /[^\?\&]+=[^\?\&]+/g,
                arr = location.search.match(reg),
                o = {};

            for (var i in arr) {
                var combo = arr[i].split('=');
                if (combo[0]) {
                    o[combo[0]] = combo[1] || '';
                }
            }
            return o;
        }

        console.log(get());

        location.href = 'http://music.ssting.com.cn/class/read'
    });

//    $('.table-sort').dataTable({
//        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
//        "bStateSave": true,//状态保存
//        "pading":false,
//        "aoColumnDefs": [
//            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//            {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
//        ]
//    });

    /*资讯-添加*/
    function article_add(title,url,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*资讯-审核*/
    function article_shenhe(obj,id){
        layer.confirm('审核文章？', {
                btn: ['通过','不通过','取消'],
                shade: false,
                closeBtn: 0
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布', {icon:6,time:1000});
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                $(obj).remove();
                layer.msg('未通过', {icon:5,time:1000});
            });
    }
    /*资讯-下架*/
    function article_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*资讯-发布*/
    function article_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*资讯-申请上线*/
    function article_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }
var $j = $ =jQuery.noConflict();

    var end = $('#endDate');
$j('#beginDate').datepicker(
    {
        language:  "zh-CN",
        startView: 0,
        format: "yyyy-mm-dd",
        endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
    }).on('changeDate', function(ev){
    if(ev.date){
        end.datepicker('setStartDate', new Date(ev.date.valueOf()))
    }else{
        end.datepicker('setStartDate',null);
    }
})

$j('#endDate').datepicker(
    {
        language:  "zh-CN",
        startView:0,
        format: "yyyy-mm-dd",
        endDate:new Date(new Date().getTime() - 24 * 1 * 3600000)
    }).on('changeDate', function(ev){
    if(ev.date){
        $j('#beginDate').datepicker('setEndDate', new Date(ev.date.valueOf()))
    }else{
        $j('#beginDate').datepicker('setEndDate',new Date());
    }

})
</script>
</body>
</html>