<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/28
 * Time: 14:03
 */
\amusic\assets\AmusicAsset::register($this)
?>
<?php $this->beginPage() ?>

<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
<?php $this->beginBody() ?>

<div>

    <div>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                [
                    'attribute'=>'id',
                ],
                [
                    'attribute'=>'cover',
                    'format'=>'html',
                    'value'=>function($model){
                        return '<img width="100px" src="'.$model->cover.'">';
                    }
                ],
                [
                    'attribute'=>'title',
                    'format'=>'raw',
                    'value'=>function($model){
                        if(strlen($model->title)>20){
                            $model->title = mb_substr($model->title,0,20).'...';
                        }
                        return '<a target="_blank" href="'.Yii::$app->urlManager->createUrl('/push/detail.html?id='.$model->id).'">'.$model->title.'</a>';
                    }
                ],

                [
                    'attribute'=>'link',
                    'format'=>'raw',
                    'value'=>function($model){
                        return '<a target="_blank" href="'.$model->link.'">'.$model->link.'</a>';
                    }
                ],

                ['attribute'=>'author'],


                ['attribute'=>'tag',
                    'format'=>'raw',
                    'value'=>function($model){

            return '<span>'.$model->tag.'</span><span class="glyphicon glyphicon-edit" data-id="'.$model->id.'" data-content=\''.$model->tag.'\' data-toggle="modal" style="float: right" data-target="#myModal"></span>';
//return '<div><span>'.$model->tag.'</span><a><span class="glyphicon glyphicon-edit" data-id="'.$model->id.'" data-content=\''.$model->tag.'\' data-toggle="modal" style="float: right" data-target="#myModal"></span></a></div>';
                }],




                [
                    'attribute'=>'download_time',
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>'操作',
                    'template'=>'{push}<br><br>{delete}',
                    'buttons'=>[
                        'push'=>function($url,$model,$key) {

                            $options = [
                                'title' => Yii::t('yii', '推送'),
                                'aria-label' => Yii::t('yii', '推送'),
                                'data-confirm' => Yii::t('yii', '你确定要推送此项吗?'),
                                'data-method' => 'post',
                                'data-pjax' => 0,
                            ];
                            return \yii\helpers\Html::a('<span class="glyphicon glyphicon-share	"></span>', '/push/editor.html?id='.$key, $options);
                        },
                    ],
                ],
            ],
            'pager' => [
                'firstPageLabel'=>'首页',
                'lastPageLabel'=>'尾页',
                'nextPageLabel' => '下一页',
                'prevPageLabel' => '上一页',
            ],
//            'summary' => false
        ]) ?>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" modal-backdrop in>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    文章标签修改
                </h4>
            </div>
            <form>
                <input type="hidden" id="_csrf" name="<?php echo Yii::$app->request->csrfParam;?>" value="<?php echo yii::$app->request->csrfToken?>">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <textarea id="tag" name="tag" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交更改
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<?php $this->endPage() ?>

<script type="text/javascript">

    var button;

    $('#myModal').on('show.bs.modal', function (ev) {
        button = $(ev.relatedTarget);
        var modal = $(this), data_id = button.data('id');

        var data_content = button.data('content');
//        var data_content = button.attr('data-content');
        modal.find('[name="tag"]').val(data_content);
        modal.find('[name="id"]').val(data_id);

        var $parentBox = modal.find('form');
        $parentBox.validate({
            submitHandler:function () {
                $.post(
                    '/modal/edit',
                    $parentBox.serialize(),
                    function (d) {
                        d = eval("("+d+")");
                        if(d){
                            button.prev().html(d.data);
                            modal.modal('hide');
                        }else {
                            alert('修改失败')
                        }
                    }
                );
            }
        })
    });

    $("#myModal").on("hidden.bs.modal", function(ev) {
        var value = $('#tag').val();
//        button.attr('data-content', value)

        button.data('content', value)
    });

</script>





