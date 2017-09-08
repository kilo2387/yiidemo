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

class SendEmailEvent {
    private $_mail;
    private $isBug = false;
    private $host;
    private $port = 465;
    private $from_name;
    private $host_name;
    private $from_address;
    private $username;
    private $auth_token;
    private $html;
    private $title;
    public function __construct($config = '', $to = '')
    {
        $config = [
            'isBug'     => 1,
            'host'      => 'smtp.qq.com',
            'ssl'       => 'ssl',
            'port'      => '465',
            'auth_token'=> 'reohxlmtecubbiie',
            'title'     => 'hello world'
        ];

        $to = [
            '15817487936@163.com',
            '569640735@qq.com',
            'kilometer053983@gmail.com'
        ];

        foreach ($config as $key=>$cfg){
            $this->$key = $cfg;
        }



        var_dump($this);die;
        $mail = new PHPMailer(); //实例化PHPMailer核心类

        $mail->SMTPDebug = $this->isBug;        //启用smtp的debug进行调试,默认关闭

        $mail->isSMTP();                        //使用smtp鉴权方式发送邮件

        $mail->SMTPAuth = true;                 //smtp需要鉴权 这个必须是true
//        if(isset($config['isBug']) && !empty($config['isBug'])) {
//        }



        if(isset($config['host']) && !empty($config['host'])) {
            $mail->Host = $this->host;              //服务器地址
        }else{
            throw new Exception('没有设置账号');
        }

        $mail->Port = $this->port;              //可选465或587

        $mail->SMTPSecure = 'ssl';              //设置使用ssl加密方式登录鉴权

//        if(isset($config['isBug']) && !empty($config['isBug'])) {

//        }else{
//            $mail->Port = $this->port;              //可选465或587
//        }

        $mail->Hostname = $this->host_name;   //设置发件人的主机域 可选

        $mail->CharSet = 'UTF-8';               //GB2312 utf8在某些客户端收信下会乱码

        $mail->FromName = $this->from_name;            //设置发件人姓名|昵称

        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username = $this->username;

        //smtp授权码）
//        $mail->Password = 'reohxlmtecubbiie';
        $mail->Password = $this->auth_token;

        //发件人邮箱地址
        $mail->From = $this->from_address;

        //邮件正文是否为html编码
        $mail->isHTML(true);

        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大

        //添加多个收件人 则多次调用方法即可
        if(is_array($to)) {
            foreach ($to as $addr) {
                $mail->addddress($addr, 'lsgo在线通知');
            }
        }else{
            $mail->addAddress($to,'lsgoj下线通知');
        }

        //添加该邮件的主题
        $mail->Subject = $this->title;

        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件

//        $mail->Body = file_get_contents($this->html);
        $mail->Body = '你好, <b>朋友</b>! <br/>这是一封来自<a href="http://www.erdangjiade.com" target="_blank">erdangjiade.com</a>的邮件！<br/><img alt="erdangjiade" src="cid:my-attach">'; //邮件主体内容

        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        if(isset($config['files']) && !empty($config['files'])){
            if(is_array($config['files'])){
                foreach ($config['files'] as $file){
                    $file_name = basename($file);
                    $mail->addAttachment($file, $file_name);
                }
            }else{
                $file_name = basename($config['files']);
                $mail->addAttachment($config['files'], $file_name);
            }
        }

        $status = $mail->send();

//        return $this->_mail;
    }

    public function send(){
        return $this->_mail->send();
//        if(!$status){
//            return
//        }else{
//            return true;
//        }
    }
}