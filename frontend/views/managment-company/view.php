<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;


?>

<div class="managment-company-view">

    <h1><?= Html::encode($model->title) ?></h1>
    <h4>Телефон:</h4><?= Html::encode($model->number) ?>
    <h4>Сайт:</h4><?= Html::a(Html::encode($model->domen), Url::to($model->domen, true), ['target' => '_blank']) ?>
    <h4>Адрес:</h4><?= Html::encode($model->getFullAddressId()) ?>

</div>