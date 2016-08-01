<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ManagmentCompany */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Managment Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managment-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'address.fulladdress',
            'domen',
            'number',
            'legal_name',
            'legal_address',
            'inn',
            'kpp',
            'ogrn',
            'ras_schet',
            'korr_schet',
            'bik',
            'inn_bank',
            'kpp_bank',
            'ogrn_bank',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
