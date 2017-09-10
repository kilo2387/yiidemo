<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/8
 * Time: 17:31
 */
namespace common\Event;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use yii\base\Event;
use yii\base\Object;
use yii\di\Container;

class SendEmailEvent extends Container {
    public $_mail;
    public $is_bug = false;
    public $host;
    public $port = 465;
    public $from_name;
    public $host_name;
    public $from_address;
    public $username;
    public $auth_token;
    public $html;
    public $title;
    public $content;
//    public function __construct($config = '', $to = '')
//    public function __construct(array $config)
//    {
////        $config = [
////            'is_bug'     => 1,
////            'host'      => 'smtp.qq.com',
////            'username'      =>'237081788@qq.com',
////            'from_address'=>'237081788@qq.com',
////            'port'      => '465',
////            'auth_token'=> 'reohxlmtecubbiie',
////
////
////            'title'     => 'hello world',
////            'from_name' => '这是测试email',
////            'content'   => ''
////        ];
////        new PHPMailer(true);
//        $tos = [
//            '15817487936@163.com'=>'网易',
//            '569640735@qq.com'=>'QQ',
//            'kilometer053983@gmail.com'=>'Google'
//        ];
//
//
//        foreach ($config as $key=>$cfg){
//            $this->$key = $cfg;
//        }
////
////
////
////        var_dump($this);die;
////
////
////        //添加该邮件的主题
////        $mail->Subject = $this->title;
////
////        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
////
//////        $mail->Body = file_get_contents($this->html);
////        $mail->Body = '你好, <b>朋友</b>! <br/>这是一封来自<a href="http://www.erdangjiade.com" target="_blank">erdangjiade.com</a>的邮件！<br/><img alt="erdangjiade" src="cid:my-attach">'; //邮件主体内容
////
////        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
////        if(isset($config['files']) && !empty($config['files'])){
////            if(is_array($config['files'])){
////                foreach ($config['files'] as $file){
////                    $file_name = basename($file);
////                    $mail->addAttachment($file, $file_name);
////                }
////            }else{
////                $file_name = basename($config['files']);
////                $mail->addAttachment($config['files'], $file_name);
////            }
////        }
////
////        $status = $mail->send();
//
//
////        return $this->_mail;
//    }

    public function init()
    {

        //实例化PHPMailer核心类
        $mail = new PHPMailer(true);
        //启用smtp的debug进行调试,默认关闭
        $mail->SMTPDebug = $this->is_bug;
        //服务器地址
        $mail->Host = $this->host;
        //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->Port = $this->port;
        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = $this->from_name;
        //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Hostname = \Yii::getAlias('@backend_baseUrl');
        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username = $this->username;
        //smtp授权码）
        $mail->Password = $this->auth_token;
        //发件人邮箱地址
        $mail->From = $this->from_address;


        //使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;



        //设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';


        //设置smtp的helo消息头 这个可有可无 内容任意
        // $mail->Helo = 'Hello smtp.qq.com Server';

        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';
        //邮件正文是否为html编码
        $mail->isHTML(true);

//        $mail->addAddress('15817487936@163.com','636363');



        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        // $mail->addAttachment('./d.jpg','mm.jpg');
        //同样该方法可以多次调用 上传多个附件
        // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');

        $this->_mail = $mail;

    }

    public function send(){
        return $this->_mail->send();



//        if(!$status){
//            throw new PHPMailerException('发送失败');
//        }else{
//            return true;
//        }

    }

    public function to(array $tos){
        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
        if(is_array($tos)) {
            foreach ($tos as $key => $v) {
                $this->_mail->addAddress($key, $v);
            }
        }else{
            throw new Exception('邮箱地址不是一个数组');
        }
        //添加多个收件人 则多次调用方法即可
        return $this;
    }

    public function title($title){
        //添加该邮件的主题
        $this->_mail->Subject = $title;
        return $this;
    }

    public function content($content){
        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        $this->_mail->Body = $content;
        return $this;
    }

}