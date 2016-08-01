<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ManagmentCompany;
/* @var $this yii\web\View */
/* @var $model common\models\House */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'attachment_id')->textInput() ?>

    <?= $form->field($model, 'managment_company_id')->dropDownList(\yii\helpers\ArrayHelper::map(ManagmentCompany::find()->All(),'id','title') ,
        ['prompt' => Yii::t('app', '- Выберите управляющую компанию -')]) ?>

    <?= $form->field($model, 'addressText')->textInput() ?>

    <?= $form->field($model, 'floors')->textInput() ?>

    <?= $form->field($model, 'apartaments')->textInput() ?>

    <?= $form->field($model, 'year_of_build')->textInput() ?>

    <?= $form->field($model, 'year_of_commissioning')->textInput() ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
