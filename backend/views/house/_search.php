<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HouseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'attachment_id') ?>

    <?= $form->field($model, 'managment_company_id') ?>

    <?= $form->field($model, 'address_id') ?>

    <?php // echo $form->field($model, 'floors') ?>

    <?php // echo $form->field($model, 'apartaments') ?>

    <?php // echo $form->field($model, 'year_of_build') ?>

    <?php // echo $form->field($model, 'year_of_commissioning') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'series') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
