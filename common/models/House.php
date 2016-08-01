<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%house}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $attachment_id
 * @property integer $managment_company_id
 * @property integer $address_id
 * @property integer $floors
 * @property integer $apartaments
 * @property integer $year_of_build
 * @property integer $year_of_commissioning
 * @property string $state
 * @property string $series
 * @property string $type
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Apartment[] $apartments
 * @property MapAddress $address
 * @property ManagmentCompany $managmentCompany
 * @property Post[] $posts
 */
class House extends \yii\db\ActiveRecord
{
    public $addressText;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%house}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [


            [['state', 'series', 'type','addressText'], 'string', 'max' => 255],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => MapAddress::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['managment_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => ManagmentCompany::className(), 'targetAttribute' => ['managment_company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'attachment_id' => 'Attachment ID',
            'managment_company_id' => 'Managment Company ID',
            'address_id' => 'Address ID',
            'floors' => 'Floors',
            'apartaments' => 'Apartaments',
            'year_of_build' => 'Year Of Build',
            'year_of_commissioning' => 'Year Of Commissioning',
            'state' => 'State',
            'series' => 'Series',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['house_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(MapAddress::className(), ['id' => 'address_id']);
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
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['house_id' => 'id']);
    }
}
