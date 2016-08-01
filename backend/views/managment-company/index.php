<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManagmentCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Managment Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managment-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Managment Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'address.fulladdress',
            'domen',
            'number',
            // 'legal_name',
            // 'legal_address',
            // 'inn',
            // 'kpp',
            // 'ogrn',
            // 'ras_schet',
            // 'korr_schet',
            // 'bik',
            // 'inn_bank',
            // 'kpp_bank',
            // 'ogrn_bank',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
