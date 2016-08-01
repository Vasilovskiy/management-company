<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%managment_company_user}}".
 *
 * @property integer $managment_company_id
 * @property integer $user_id
 *
 * @property ManagmentCompany $managmentCompany
 * @property User $user
 */
class ManagmentCompanyUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%managment_company_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['managment_company_id', 'user_id'], 'required'],
            [['managment_company_id', 'user_id'], 'integer'],
            [['managment_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => ManagmentCompany::className(), 'targetAttribute' => ['managment_company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'managment_company_id' => 'Managment Company ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagmentCompany()
    {
        return $this->hasOne(ManagmentCompany::className(), ['id' => 'managment_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
