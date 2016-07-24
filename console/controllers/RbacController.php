<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $user->description = '������������';
        $auth->add($user);

        $tenant = $auth->createRole('tenant');
        $tenant->description = '���������';
        $auth->add($tenant);
        $auth->addChild($tenant, $user);

        $owner = $auth->createRole('owner');
        $owner->description = '��������';
        $auth->add($owner);
        $auth->addChild($owner, $tenant);

        $managmentCompany = $auth->createRole('managmentCompany');
        $managmentCompany->description = '����������� ��������';
        $auth->add($managmentCompany);
        $auth->addChild($managmentCompany, $owner);

        $admin = $auth->createRole('admin');
        $admin->description = '�������������';
        $auth->add($admin);
        $auth->addChild($admin, $managmentCompany);

        $auth->assign($admin, 1);
    }
}