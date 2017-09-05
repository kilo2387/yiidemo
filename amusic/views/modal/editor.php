<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/6 1:24.
 *
 */
use amusic\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
\amusic\assets\AmusicAsset::register($this);
//\amusic\assets\AppAsset::register($this);
//AppAsset::register($this);
?>
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<!--<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">-->
<!---->
<!--<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha/js/umd/popover.js"></script>-->
<!--<script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
<!--<script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.js"></script>-->
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<?php $this->beginPage() ?>

<?php $this->beginBody() ?>


<input data-id="aaa" type="text" value="aaaaaaaaaaaaa">
<input data-id="bbb" type="text" value="bbbbbbbbbbbbbbbbb">
<input data-id="ccc" type="text" value="cccccccccccccccc">
<button id="xxx" class="btn btn-primary btn-lg" data-content="aaaaaaaaaaaaa" data-toggle="modal" data-target="#myModal">
    开始演示模态框
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    模态框（Modal）标题
                </h4>
            </div>
            <form class="lwer" role="form">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="name">文本框</label>
                        <textarea id="summary" class="form-control" rows="3">er</textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="submit" class="btn btn-default submit-btn">提交</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<?php $this->endBody() ?>


<?php $this->endPage() ?>
<?php \amusic\assets\AmusicAsset::register($this); ?>

<script type="text/javascript">
//    $(function() {
//        $('#myModal').modal()
//    });
$('#xxx').one('click', function (ev) {
    console.log('xer')
})

    $('#myModal').one('show.bs.modal', function (ev) {
//        console.log('werwedsss');
        var modal = $(this), button = $(ev.relatedTarget), data_content = button.data('content');
//        modal.find('[id="summary"]').html($('#content').val())

        console.log(data_content)
        console.log(button)
        modal.find('[id="summary"]').html(data_content)
//        checkValidate(modal,'gutuuuuuuu', '/modal/index')

//        var $parentBox = modal.find('form');
//        $parentBox.validate({
//            submitHandler:function () {
//                console.log('ercx')
////                modal.hide()
//                modal.modal('hide')
//            }
//        })
//        $('.lwer').validate({
//            submitHandler:function () {
////                console.log('ercx')
//////                modal.hide()
//                modal.modal('hide')
//            }
//        });

    })

    $('.lwer').bootstrap({
        submitHandler:function () {
//                console.log('ercx')
////                modal.hide()
                modal.modal('hide')
            }
    });

/**
 * 验证并提交请求
 * @param model
 * @param validateParams
 */
 function checkValidate (model, validateParams, goUrl) {
    var $parentBox = model.find('form');
    $parentBox.validate({
        debug: true,
        ignore: [],
        rules: validateParams,
        submitHandler : function () {
            $.get(goUrl, $parentBox.serialize(), function (d) {
//                if (d.errcode == 0) {
////                    BOSS.floatTips.successTips(d.errstr+'！页面将在2秒内刷新');
//                    setTimeout(function () {
//                        window.location.reload();
//                    }, 2000);
//                } else {
////                    BOSS.floatTips.errorTips(d.errstr);
//                    setTimeout(function () {
//                        window.location.reload();
//                    }, 2000);
//                }
                model.hide();
            }, 0);
        }

    });
}

</script>
