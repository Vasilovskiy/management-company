<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <pre>
        <?php
            print_r($model->errors);
        ?>
    </pre>
    <?= $form->field($model, 'username')->widget(\yii\widgets\MaskedInput::className(),
        ['mask' => '+7 (999) 999 99-99'])->hint('Пожалуйста, введите номер телефона')->label('*Номер телефона') ?>

    <?= $form->field($model,
        'password')->textInput(['maxlength' => true])->hint('Пожалуйста, введите пароль')->label('*Пароль') ?>

    <?= $form->field($model,
        'password_confirm')->textInput(['maxlength' => true])->hint('Пожалуйста, повторите пароль')->label('*Повторите пароль') ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name',
        'description'), ['prompt' => Yii::t('app', '- Выберите роль -')]); ?>

    <?= $form->field($model,
        'first_name')->textInput(['maxlength' => true])->hint('Пожалуйста, введите имя')->label('Имя') ?>

    <?= $form->field($model,
        'middle_name')->textInput(['maxlength' => true])->hint('Пожалуйста, введите отчество')->label('Отчество') ?>

    <?= $form->field($model,
        'last_name')->textInput(['maxlength' => true])->hint('Пожалуйста, введите фамилию')->label('Фамилия') ?>

    <?= $form->field($model,
        'email')->textInput(['maxlength' => true])->hint('Пожалуйста, введите Email')->label('Email') ?>

    <?= $form->field($model,
        'date_of_birth')->textInput()->hint('Пожалуйста, введите дату рождения')->label('Дата рождения') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
