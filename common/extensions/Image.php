<?php

class Image
{
    private $_img;
    public $handle;

    public function __construct($config)
    {
        $this->_img = new Imagick();
        foreach($config as $key => $value){
            $this->$key = $value;
        }
    }

    public function cropImage($w, $h, $y, $x)
    {
        $this->_img->cropImage($w, $h, $y, $x);
    }


    /**
     * 释放资源
     */
    public function destroy(){
        $this->_img->clear();
        $this->_img->destroy();
    }
}