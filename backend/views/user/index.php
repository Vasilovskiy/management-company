<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            [
                'attribute' => 'name',
                'label' => 'Имя',
                'value' => function ($model, $index, $value) {
                    return $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name;
                },
            ],
            [
                'attribute' => 'role',
                'label' => 'Роль',
                'value' => function ($model, $index, $widget) {
                    if ($model->getRole() == "ownerCompany") {
                        return "Управляющий компании";
                    } elseif ($model->getRole() == "managerCompany") {
                        return "Менеджер компании";
                    } elseif ($model->getRole() == "owner") {
                        return "Владелец";
                    } elseif ($model->getRole() == "tenant") {
                        return "Арендатор";
                    } elseif ($model->getRole() == "user") {
                        return "Пользователь";
                    } elseif ($model->getRole() == "admin") {
                        return "Администратор";
                    }
                }
            ],
            //'first_name',
            //'middle_name',
            //'last_name',
            'email:email',
            'date_of_birth:date',
            // 'status',
            //'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
