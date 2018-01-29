<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2018/1/19
 * Time: 14:49
 */
namespace backend\controllers;
use amusic\models\ClassMaterialCollections;
use PhpOffice\PhpWord\PhpWord;
use yii\helpers\ArrayHelper;

class WordController extends \backend\base\Controller
{
    public function actionTest(){
        $collection = ClassMaterialCollections::findOne(11218);
        
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText('"Learn from yesterday, live for today, hope for tomorrow. ' . 'The important thing is not to stop questioning." ' . '(Albert Einstein)');

        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */

        // Adding Text element with font customized inline...
        $section->addText('"Great achievement is usually born of great sacrifice, ' . 'and is never the result of selfishness." ' . '(Napoleon Hill)', ['name' => 'Tahoma', 'size' => 10]);

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle($fontStyleName, ['name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true]);
        $section->addText('"The greatest accomplishment is not in never falling, ' . 'but in rising again after you fall." ' . '(Vince Lombardi)', $fontStyleName);

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(\Yii::getAlias('@runtime/helloWorld.docx'));


//        // Saving the document as ODF file...
//        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//        $objWriter->save(\Yii::getAlias('@runtime/helloWorld.odt'));
//
//        // Saving the document as HTML file...
//        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//        $objWriter->save(\Yii::getAlias('@runtime/helloWorld.html'));

        var_dump(\Yii::getAlias('@runtime/helloWorld.html'));
        /* Note: we skip RTF, because it's not XML-based and requires a different example. */
        /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */

    }
}