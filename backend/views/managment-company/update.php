<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ManagmentCompany */

$this->title = 'Update Managment Company: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Managment Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="managment-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
