<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->widget(\yii\widgets\MaskedInput::className(),
                ['mask' => '+7 (999) 999 99-99']) ?>

            <?= $form->field($model,
                'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'password_confirm')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'middle_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,
                'birthday_formatted')->textInput()->hint('Пожалуйста, введите дату рождения')->widget(\yii\jui\DatePicker::classname(),
                [
                    'options' => [
                        'class' => 'form-control'
                    ]
                ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
