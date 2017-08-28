<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/29 4:45.
 *
 */

?>
<LINK href="../date/bootstrap.css" rel="stylesheet">
<SCRIPT src="../date/jquery.min.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../date/bootstrap.min.js" type="text/javascript"></SCRIPT>


<div class="well">
    <div id="datetimepicker1" class="input-append">
        <input data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
        <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
    </div>
</div>




<SCRIPT src="../date/bootstrap-datetimepicker.min.js" type="text/javascript"></SCRIPT>

<!--<SCRIPT src="Bootstrap%20Date-Time%20Picker_files/bootstrap-datetimepicker.pt-BR.js" type="text/javascript"></SCRIPT>-->

<!--<SCRIPT src="Bootstrap%20Date-Time%20Picker_files/index.js" type="text/javascript"></SCRIPT>-->

<!--<SCRIPT src="Bootstrap%20Date-Time%20Picker_files/respond.min.js"></SCRIPT>-->

<SCRIPT type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            language: 'pt-BR'
        });
    });
</SCRIPT>