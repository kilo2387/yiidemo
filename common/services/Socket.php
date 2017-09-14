<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 5:29.
 *
 */
set_time_limit(0);
//class Socket{
//    private $host = '112.74.182.162';
//    private $port = 8020;
//    private $maxuser = 10;
//    public  $accept = array();//所有客户端
//    private $cycle = array(); //循环连接池
//    private $isHand = array();//握手信息
//    public  $pcAccept = array(); //连接的pc端
//    public $socket;
//
//    function __construct($host='', $port='', $max='') {
//        if(!empty($host)) $this->host = $host;
//        if(!empty($port)) $this->port = $port;
//        if(!empty($maxuser)) $this->maxuser = $max;
//    }
//
//    public function start() {
//        //挂起socket服务端
//        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
////        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, TRUE);
////        var_dump($this->host);
//        socket_bind($this->socket, $this->host, $this->port) ;//or die("socket_bind() 失败的原因是:".socket_strerror(socket_last_error())."<br>");
//        socket_listen($this->socket, $this->maxuser);
//        while(TRUE) {
//            //获取所有socket连接
//            $this->cycle = $this->accept;
//            $this->cycle[] = $this->socket;
//
//            //阻塞用，有新连接时才会结束
//            socket_select($this->cycle, $write, $except, null);
//            //遍历循环池
//            foreach ($this->cycle as $k => $v) {
//                //添加连接
//                if($v === $this->socket) {
//                    if (($accept = socket_accept($v)) < 0) {
//                        continue;
//                    }
//                    $this->add($accept);
//                    continue;
//                }
//
//                //阻塞已断开连接
//                $acceptId = array_search($v, $this->accept);
//                if ($acceptId === NULL) {
//                    continue;
//                }
//
//                //没消息的socket就断开
//                if (!@socket_recv($v, $data, 1024, 0) || !$data) {
//                    $this->close($v);
//                    continue;
//                }
//
//                //判断是否需要握手
//                if(preg_match("/Sec-WebSocket-Key: (.*)\r\n/",$data,$match)){
//                    //进行握手
//                    if (!$this->isHand[$acceptId]) {
//                        $this->upgrade($v, $match[1], $acceptId);
//                        continue;
//                    }
//                }
//
//                //获取头文件数据，判断是否需要解码
//                if(substr($data, 0, 9) == 'noencode:'){
//                    $data = substr($data,9,strlen($data));
//                }else{
//                    //将数据进行解码
//                    $data = $this->decode($data);
//                    //登陆成功，关闭与PC端连接
//                    if($data == 'success'){
//                        $this->close($v);
//                    }
//                    continue;
//                }
//
//                //向所有PC发送uid
//                if(!empty($this->pcAccept)){
//                    $data = $this->frame($data);
//                    $this->send($data);
//                }
//                //断开移动端连接,减少损耗
//                $this->close($v);
//            }
//            sleep(1);
//        }
//    }
//
//    //往连接池里添加新连接
//    private function add($accept) {
//        $this->accept[] = $accept;
//        $accept = array_keys($this->accept);
//        $acceptId = end($accept);
//        $this->isHand[$acceptId] = FALSE;
//    }
//
//    //向所有pc端发送信息
//    private function send($data){
//        foreach ($this->pcAccept as $accept) {
//            socket_write($accept, $data, strlen($data));
//        }
//    }
//
//    //关闭一个连接
//    private function close($accept) {
//        $acceptId = array_search($accept, $this->accept);
//        socket_close($accept);
//        //销毁变量
//        unset($this->accept[$acceptId]);
//        unset($this->isHand[$acceptId]);
//    }
//
//    //与客户端握手
//    private function upgrade($accept, $key, $acceptId) {
//        //服务端生成对应key值返回
//        $key = base64_encode(sha1($key . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));
//        $upgrade  = "HTTP/1.1 101 Switching Protocol\r\n" .
//            "Upgrade: websocket\r\n" .
//            "Connection: Upgrade\r\n" .
//            "Sec-WebSocket-Accept: " . $key . "\r\n\r\n";  //必须以两个回车结尾
//        //向套接口写入数据
//        socket_write($accept, $upgrade, strlen($upgrade));
//        $this->isHand[$acceptId] = TRUE;
//        $this->pcAccept[$acceptId] = $accept;
//    }
//
//    //websocket在传输中是要进行编码
//    //编码
//    public function frame($s){
//        //将数据转为数组，一个元素长度最高为125
//        $a = str_split($s, 125);
//        //添加头文件信息，不然前台无法接受
//        if (count($a) == 1){
//            return "\x81" . chr(strlen($a[0])) . $a[0];
//        }
//        $ns = "";
//        foreach ($a as $o){
//            $ns .= "\x81" . chr(strlen($o)) . $o;
//        }
//        return $ns;
//    }
//
//    //解码
//    public function decode($buffer) {
//        $len = $masks = $data = $decoded = null;
//        //获取传递过来数据长度
//        $len = ord($buffer[1]) & 127;
//        if ($len === 126) {
//            $masks = substr($buffer, 4, 4);
//            $data = substr($buffer, 8);
//
//        }
//        else if ($len === 127) {
//            $masks = substr($buffer, 10, 4);
//            $data = substr($buffer, 14);
//        }
//        else {
//            $masks = substr($buffer, 2, 4);
//            $data = substr($buffer, 6);
//        }
//        for ($index = 0; $index < strlen($data); $index++) {
//            $decoded .= $data[$index] ^ $masks[$index % 4];
//        }
//        return $decoded;
//    }
//}
//
////开启socket服务
////$config = include('config.php');
////$ip = $config['ip'];
////$port = $config['port'];
//$socket = new Socket();
//$socket->start();

/**
 * File name server.php
 * 服务器端代码
 *
 * @author guisu.huang
 * @since 2012-04-11
 *
 */

//确保在连接客户端时不会超时
//set_time_limit(0);
//设置IP和端口号
$address = "172.18.151.164";
$port = 8080; //调试的时候，可以多换端口来测试程序！
/**
 * 创建一个SOCKET
 * AF_INET=是ipv4 如果用ipv6，则参数为 AF_INET6
 * SOCK_STREAM为socket的tcp类型，如果是UDP则使用SOCK_DGRAM
 */
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//阻塞模式
socket_set_block($sock) or die("socket_set_block() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//绑定到socket端口
$result = socket_bind($sock, $address, $port) or die("socket_bind() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//开始监听
$result = socket_listen($sock, 4) or die("socket_listen() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
echo "OK\nBinding the socket on $address:$port ... ";
echo "OK\nNow ready to accept connections.\nListening on the socket ... \n";
do { // never stop the daemon
    //它接收连接请求并调用一个子连接Socket来处理客户端和服务器间的信息
    $msgsock = socket_accept($sock) or  die("socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "/n");

    //读取客户端数据
    echo "Read client data \n";
    //socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.
    $buf = socket_read($msgsock, 8192);
    echo "Received msg: $buf   \n";

    //数据传送 向客户端写入返回结果
    $msg = "welcome \n";
    socket_write($msgsock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
    //一旦输出被返回到客户端,父/子socket都应通过socket_close($msgsock)函数来终止
    socket_close($msgsock);
} while (true);
socket_close($sock);