<?php

namespace frontend\controllers;

use common\models\ManagmentCompany;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;


class ManagmentCompanyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ManagmentCompany::find(),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        $this->view->title = 'Companies';
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function findModel($id)
    {
        if (($model = ManagmentCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}