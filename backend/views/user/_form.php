<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->widget(\yii\widgets\MaskedInput::className(),
        ['mask' => '+7 (999) 999 99-99']) ?>

    <?= $form->field($model,
        'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model,
        'password_confirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name',
        'description'), ['prompt' => Yii::t('app', '- Выберите управляющего -')]); ?>

    <?= $form->field($model,
        'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,
        'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,
        'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,
        'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,
        'birthday_formatted')->textInput()->hint('Пожалуйста, введите дату рождения')->widget(\yii\jui\DatePicker::classname(), [
            'options' => [
                'class' => 'form-control',
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ]
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
