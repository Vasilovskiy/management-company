<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ManagmentCompany */

$this->title = 'Create Managment Company';
$this->params['breadcrumbs'][] = ['label' => 'Managment Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managment-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
