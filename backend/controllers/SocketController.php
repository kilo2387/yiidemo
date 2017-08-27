<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 3:00.
 *
 */

namespace backend\controllers;

use backend\models\Socket;
use milan\qrcode\GenerateQRCode;
use yii\web\Controller;
use backend\models\WebSocketClient;

class SocketController extends Controller{

    public function makeCode(){
//        die('dd');
        $onf = new GenerateQRCode('xcs');
        var_dump($onf);
    }

    public function actionApi(){
//        $socket = new Socket();
//        $socket->start();

        $uid = $this->makeUid();
//        server=http://yii2.ssting.com.cn/socket/api&
        $data = 'http://yii2.ssting.com.cn/socket/login?uid='.$uid;

        return $this->render('api',[
            'data'=>$data,
            'server'=>'wss://112.74.182.162',
            'uid'=>$uid
        ]);
    }

    public function actionLogin(){
//        $socket = new Socket();
//        $socket->start();
//        $this->Start();

        $uid = isset($_GET['uid'])? $_GET['uid']:'64646';
//        var_dump($uid);die();
//$uid = $_GET['uid'];
//$name= 'eww2';
            if(empty($uid)) exit('error');
//        $socket = new Socket();
//        $socket->start();
            //加载配置
        $name = 'xwww';
//            $config = include('config.php');
//            $host = $config['host'];
            $host = 'localhost';
//            $port = $config['port'];
            $port = '9501';
            $json = json_encode(['uid'=>$uid,'name'=>$name]);
            $data = 'noencode:'.$json;
            //连接socket服务器
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $result = socket_connect($socket, $host, $port);
            socket_write($socket, $data, strlen($data));
            socket_close($socket);
//            @unlink("public/".$uid.".png");

    }

    private function makeUid(){
        return sha1(microtime().session_id().rand(1,100000));
//        echo $uid;die;
//        echo session_id();die();
    }

    public function Start(){
        $socket = new Socket();
        $socket->start();
    }

    public function actionClient(){
        return $this->render('client', [

        ]);
    }

    public function actionPush(){
        $opt = getopt("c:n:k:");
        print_r($opt);
//        echo '<br>xw';
//        if (empty($opt['c']) || empty($opt['n']))
//        {
//            echo "examples:  php client.php -c 100 -n 10000" . PHP_EOL;
//            return;
//        }
        $clients = $opt['c'];
        $count = $opt['n'];
        $size = empty($opt['k']) ? 0 : $opt['k'];
//        require __DIR__ . "/WebSocketClient.php";
        $host = '127.0.0.1';
        $prot = 9501;

        $client = new WebSocketClient($host, $prot);
        $data = $client->connect();
//echo $data;
        $data = "data";
        if (!empty($size))
        {
            $data = str_repeat("A", $size * 1024);
        }

        for ($i = 0; $i < 1; $i++)
        {
            echo 'wewewewd<br>';
            $client->send("hello swoole, number:" . $i . " data:" . $data);
            $recvData = "";
            //while(1) {
            $tmp = $client->recv();
            if (empty($tmp))
            {
                break;
            }
            $recvData .= $tmp;
            //}
            echo $recvData . "size:" . strlen($recvData) . PHP_EOL;
        }
        echo PHP_EOL . "======" . PHP_EOL;
        sleep(1);
        echo 'finish' . PHP_EOL;

    }

    public function actionSend(){

        $host = '127.0.0.1';
        $prot = 9501;

//        $token = isset($_POST['token']) ? htmlspecialchars($_POST['token']) : 'token_token';
//        $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'kilo';

        $client = new WebSocketClient($host, $prot);
        $client->connect();
        $data = 'kilo';
        $client->send($data);
        $recvData = "";
        $tmp = $client->recv();
        var_dump($tmp);
//        if (empty($tmp))
//        {
//            echo 'empty';
//        }else {
//
//            echo $tmp . "size:" . strlen($tmp) . PHP_EOL;
//
//            echo PHP_EOL . "======" . PHP_EOL;
//            echo 'finish' . PHP_EOL;
//        }
    }
}