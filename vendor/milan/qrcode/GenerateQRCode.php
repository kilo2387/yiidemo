<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 3:07.
 *
 */


namespace milan\qrcode;
include __DIR__ . '/phpqrcode.php';

/**
 * Class GenerateQRCode
 * @package milan\qrcode
 * @property $ret
 * @property $data
 * @property $ret
 * @property $path
 * @property $errcode
 * @property $message
 */
class GenerateQRCode
{
    public $ret;
    public $data;
    public $path;
    public $message;
    public $errcode;

    const FAILED = 0;
    const SUCCESS = 1;
    public static $STATUS = [
        self::FAILED => ['label' => '成功'],
        self::SUCCESS => ['label' => '失败']
    ];

    public function __construct($data, $fileName = '', $filePath = '', $size = 4, $margin = 2,$errorCorrectionLevel = 'L')
    {
        $fileName = trim($fileName, '/');

        if ($data == null) {
            return false;
        }

        if(is_string($data)){
            $data = trim($data);
        }

        if (!$fileName || !is_string($fileName)) {
            $rand = date('Ymdhis') . md5(microtime() . rand(10000, 99999));
            $fileName = $rand . '.png';
        } else {
            $fileName .= '.png';
        }

        if ($filePath) {
            $filePath = '/' . trim($filePath, '/') . '/';
            $filePath .= $fileName;
        } else {
            $filePath = '/www/images/qrcodes/' . $fileName;;
        }

        if($size > 100){
            return $this->result($data, $filePath, false, '100', '要生成的尺寸过大');
        }
        $matrixPointSize = $size;

        \QRcode::png($data, $filePath, $errorCorrectionLevel, $matrixPointSize, 2);
        try {
            chmod($filePath, 0755);
        } catch (\ErrorException $e) {
            return $this->result($data, $filePath, false, '755', '没有目录权限');
        }

        return $this->result($data, $filePath);
    }

    private function result($data, $filePath, $flag = true, $message = '成功', $code = 0){
        if(boolval(intval($flag))) {
            $this->ret = static::SUCCESS;
            $this->data = $data;
            $this->errcode = static::SUCCESS;
            $this->path = $filePath;
            $this->message = '成功';
        }else{
            $this->ret = static::FAILED;
            $this->data = $data;
            $this->errcode = $code;
            $this->path = $filePath;
            $this->message = $message;
        }
        return $this;
    }
}
