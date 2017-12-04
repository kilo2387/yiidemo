<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/12/4 22:42.
 *
 */

namespace common\services;

use Imagine\Imagick\Image;
use Imagine\Imagick\Imagine;

class ImageService
{
    public $imagick;
    public $_img;

    public $path;

    public function __construct($avatar)
    {
        $this->_img = new Imagine();
        $this->imagick = $this->_img->open($avatar)->getImagick();
    }

    /** 圆角处理 */
    public function roundCorners()
    {
        $this->imagick->roundCornersImage($this->imagick->getImageHeight(), $this->imagick->getImageWidth(), $stroke_width = 10.0, $displace = 5.0, $size_correction = -6.0);

        return $this;
    }

    //    public function getCircleAvatar($avatar, $circleAvatar, $r)
    //    {
    //
    //        //        $this->_img->setImageFormat('png');  //设置格式
    //        $this->_img->open('png');  //设置格式
    //
    //        $image->roundCorners($image->getImageWidth(), $image->getImageHeight());    //圆角处理
    //
    //        $image->writeImage($circleAvatar);  //保存
    //        $image->destroy();  //销毁资源
    //    }
    public function setImageFormat($ext = 'png')
    {
        $this->imagick->setImageFormat($ext);  //设置格式

        return $this;
    }

    public function save($path = '')
    {
        if (!$path){
            $path = $this->path;
        }
        if (!$path){
            throw new \ImagickException('没有有保存路径!');
        }
        $this->imagick->writeImage($path);

        return $this;
    }

    public function destroy()
    {
        $this->imagick->destroy();  //销毁资源

        return $this;
    }

}