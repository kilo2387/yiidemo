<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/30 23:55.
 *
 */
?>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.zh-CN.min.js"></script>

<div class="well">
    <div id="datetimepicker1" class="input-append date">
        <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
        <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker();
    });
</script>