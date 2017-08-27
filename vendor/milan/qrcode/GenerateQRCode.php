<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 3:07.
 *
 */


namespace milan\qrcode;
//use PHPUnit\Exception;
//use yii\base\ErrorException;
include __DIR__.'/phpqrcode.php';


class GenerateQRCode{
    private $ret;
    private $data;
    private $path;
    private $mesaage;
    public function __construct($data, $fileName = '', $filePath = '', $margin = 2)
    {
//        $ret = ['ret'=>'0', 'data'=>'', 'errcode'=>'1', 'msg'=>'成功'];
        $this->ret = 0;
        $this->data = $data;
        try {
            if (!is_string($data)) {
                throw new \Exception('生成数据必须是字符串', '1001');
            }
        }catch (\Exception $e){
            $this->errcode = $e->getCode();
            $this->path = '';
            $this->mesaage = $e->getMessage();
            return $this;
        }
        var_dump($filePath);

        $fileName = trim($fileName,'/');

        if(!$fileName || !is_string($fileName)){
            $rand = date('Ymdhis').md5(microtime() . rand(10000, 99999));
            $fileName = $rand . '.png';
        }else{
            $fileName .= '.png';
        }



        if($filePath) {
            $filePath = '/'.trim($filePath,'/').'/';
            $filePath .= $fileName;
        }else{
            $filePath = '/www/data/img/qrcode/' . $fileName;;
        }

        $errorCorrectionLevel = 'L';
        $matrixPointSize = 4;

        \QRcode::png($data, $filePath, $errorCorrectionLevel, $matrixPointSize, 2);
        try{
            chmod($filePath, 0755);
        }catch (\ErrorException $e){

            $this->data = $data;
            $this->errcode = '755';
            $this->path = $filePath;
            $this->massage = '没有目录权限';
            return $this;
        }

//        if (!$ret){
////            unlink($filePath) or $ret['msg'] = "删除指定目录的临时文件失败";
//        }

        $this->ret = 1;
        $this->data = $data;
        $this->errcode = '0';
        $this->path = $filePath;
        $this->mesaage = '成功';
        return $this;

    }
}
