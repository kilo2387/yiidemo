<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 5:08.
 *
 */
?>

<img src="http://qr.liantu.com/api.php?&w=200&text=<?= $data ?>">

<script type="text/javascript">
    if(window.WebSocket){
        console.log('This browser supports WebSocket');
    }else{
        console.log('This browser does not supports WebSocket');
    }
    var wsServer = 'ws://112.74.182.162:8080';
    var uid = '<?= $uid ?>';
//    function start(wsServer,uid){
        //配置websocket
        var ws = new WebSocket('ws://112.74.182.162:8080');
        var isConnect = false;
        ws.onopen = function (evt) {
            console.log("connect success");
            isConnect = true;
        };
        ws.onclose = function (evt) {
            console.log("Disconnected");
        };
        ws.onmessage = function (evt) {
            var data = JSON.parse(evt.data);
            console.log(data);
            if(data.uid==uid){
                if(isConnect){
                    ws.send('success');
                }
                get('img').innerHTML = data.name+' login success!!';
            }
            console.log('Retrieved data from server: ' + evt.data);
        };
        ws.onerror = function (evt) {
            console.log('Error occured: ' + evt.data);
        };

//    }

//    start(wsServer,uid);

</script>