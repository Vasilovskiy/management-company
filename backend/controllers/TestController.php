<?php

namespace backend\controllers;
use common\models\MapAddress;
class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $adada = MapAddress::find()->where(['id'=>'9'])->one();
        echo "<pre>";
        print_r($adada);
        die();
        return $this->render('index');
    }

}
