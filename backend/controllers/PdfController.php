<?php

namespace backend\controllers;

use Mpdf\Mpdf;
use yii\web\Controller;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class PdfController extends Controller
{
    public function actionTest()
    {
        //        require_once __DIR__ . '/vendor/autoload.php';

        $this->layout = false;

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        //var_dump($fontDirs, $fontData);die();
        $mpdf = new Mpdf();

        $mpdf->useAdobeCJK = true;
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $ljl = \Yii::getAlias('@backend/runtime/pdf/logo.jpg');

        //                $mpdf->WriteHTML('<div><img src="'.$ljl.'"></div>');


        //        return $this->render('pdf.php');

        $stylesheet1 = file_get_contents(\Yii::getAlias('@backend/runtime/css/pdf.css'));
        $mpdf->WriteHTML($stylesheet1,1);

        $mpdf->WriteHTML('<div style="width: 1388px;height: 975px;" class="back">
    <div class="left">
        <div class="logo_class">
            <img class="logo" src="' . $ljl . '">

        </div>

        <div class="name">
            <p style="font-size: 43px; margin: 0px;">张三</p>
            <div style="height: 32px"></div>
            <p style="font-size: 35px; margin: 0px;">完全了<span>《燃气管道专业课》的学习，考核通过并取得合格成绩，具备相应岗位的任职能力，</span></p>
            <p style="font-size: 35px">特发此证。</p>
        </div>


    </div>


    <div class="right">

    </div>
</div>
');

        $mpdf->Output();
//        die();
        $mpdf->Output(\Yii::getAlias('@backend/runtime/pdf/zs55.pdf'));

        $this->pdf2png(\Yii::getAlias('@backend/runtime/pdf/zs55.pdf'), $ljl = \Yii::getAlias('@backend/runtime/pdf/zs55.jpg'));


//        $mpdf->Output();
    }

    public function pdf2png($PDF, $Path)
    {
        if (!extension_loaded('imagick')){
            return false;
        }
        if (!file_exists($PDF)){
            return false;
        }
        $IM = new \Imagick();

//        $resoleution = $IM->getImageResolution();
//        var_dump($resoleution)

        $IM->setResolution(400, 400);

        $IM->setCompressionQuality(50);
        $IM->readImage($PDF);
        $IM->writeImage($Path);
        $IM->clear();
        $IM->destroy();


//        foreach($IM as $Key => $Var){
//            $Var->setImageFormat('png');
//            $Filename = $Path . '/' . md5($Key . time()) . '.png';
//            if ($Var->writeImage($Filename) == true){
//                $Return[] = $Filename;
//            }
//        }

//        return $Return;
    }

    public function actionShow()
    {
        $this->layout = false;
        return $this->render('pdf.php');
    }
}