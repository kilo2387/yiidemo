<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/8
 * Time: 12:32
 */
namespace backend\controllers;

use common\Event\SendEmailEvent;
use PharIo\Manifest\InvalidEmailException;
use PHPMailer\PHPMailer\PHPMailer;
use yii\base\Exception;
use yii\swiftmailer\Mailer;
use yii\web\Controller;
use Yii;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class MailController extends Controller{
    public function actionSend2()
    {
        phpinfo();
        $mail = new PHPMailer(true);
        try {
            $mail->Host = 'smtp.163.com';
            $mail->SMTPAuth = true;
            $mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
            $mail->Port = 25;
            $mail->Username = '15817487936@163.com';
            $mail->Password = '163token';
//            $mail->setOAuth('163token');

            //Set who the message is to be sent from
            $mail->setFrom('15817487936@163.com', 'First Last');
            //Set an alternative reply-to address
            $mail->addReplyTo('15817487936@163.com', '亲爱的');
            //Set who the message is to be sent to
            $mail->addAddress('15817487936@163.com', '加盟店');
            //Set the subject line
            $mail->Subject = 'PHPMailer Exceptions test';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->Body = '你好, <b>朋友</b>! <br/>这是一封来自<a href="http://www.erdangjiade.com" target="_blank">erdangjiade.com</a>的邮件！<br/><img alt="erdangjiade" src="cid:my-attach">'; //邮件主体内容
            //and convert the HTML into a basic plain-text alternative body
            $mail->msgHTML('ssssssseeeeeeeeeeeeeeeeee');
            //Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';
            //Attach an image file
//            $mail->addAttachment('wwwwww');
            //send the message
            //Note that we don't need check the response from this because it will throw an exception if it has trouble
            $mail->send();
            echo 'Message sent!';
        } catch (PHPMailerException $e) {
            echo $e->getLine()."  ".$e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }



    public function actionSend(){
        $flag = $this->sendMail('569640735@qq.com','lsgo在线通知','恭喜你成功加入LSGO实验室，开启你的学习之旅吧！');
        if($flag){
            echo "发送邮件成功！";
        }else{
            echo "发送邮件失败！";
        }
    }


    /**
     * @param $to | to email
     * @param $title | 标题
     * @param $content | 内容
     * @return bool
     */
    public function sendMail($to,$title,$content){

        //实例化PHPMailer核心类
        $mail = new PHPMailer();
        //启用smtp的debug进行调试,默认关闭
        $mail->SMTPDebug = 2;
        //使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;

        //服务器地址
        $mail->Host = 'smtp.qq.com';

        //设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';

        //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->Port = 465;

        //设置smtp的helo消息头 这个可有可无 内容任意
        // $mail->Helo = 'Hello smtp.qq.com Server';

        //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Hostname = 'http://www.ssting.com.cn';

        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';

        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = 'LSGO实验室';

        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username = '237081788@qq.com';

        //smtp授权码）
        $mail->Password = 'reohxlmtecubbiie';

        //发件人邮箱地址
        $mail->From = '237081788@qq.com';

        //邮件正文是否为html编码
        $mail->isHTML(true);

        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
        $mail->addAddress($to, 'lsgo在线通知');

        //添加多个收件人 则多次调用方法即可
         $mail->addAddress('15817487936@163.com','lsgoj下线通知');

        //添加该邮件的主题
        $mail->Subject = $title;

        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        $mail->Body = $content;

        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        // $mail->addAttachment('./d.jpg','mm.jpg');
        //同样该方法可以多次调用 上传多个附件
        // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');

        $status = $mail->send();

        if(!$status){
            throw new PHPMailerException('发送失败');
        }else{
            return true;
        }

//        //简单的判断与提示信息
//        if($status) {
//            return true;
//        }else{
//            return false;
//        }
//        return true;
    }

    public function actionSendmail(){
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        new SendEmailEvent(1,1);
    }
}