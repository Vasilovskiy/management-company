<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\ManagmentCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="managment-company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_id')->dropDownList(\yii\helpers\ArrayHelper::map(User::companyOwners(),'id','fullname') ,
        ['prompt' => Yii::t('app', '- Выберите управляющего -')]) ?>

    <?= $form->field($model, 'addressText')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->widget(\yii\widgets\MaskedInput::className(),
        ['mask' => '+7 (999) 999 99-99']) ?>

    <?= $form->field($model, 'legal_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'legal_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ras_schet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'korr_schet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrn_bank')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
