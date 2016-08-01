<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ManagmentCompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="managment-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'domen') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'legal_name') ?>

    <?php // echo $form->field($model, 'legal_address') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'kpp') ?>

    <?php // echo $form->field($model, 'ogrn') ?>

    <?php // echo $form->field($model, 'ras_schet') ?>

    <?php // echo $form->field($model, 'korr_schet') ?>

    <?php // echo $form->field($model, 'bik') ?>

    <?php // echo $form->field($model, 'inn_bank') ?>

    <?php // echo $form->field($model, 'kpp_bank') ?>

    <?php // echo $form->field($model, 'ogrn_bank') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
