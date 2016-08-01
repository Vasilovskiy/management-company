<?php

namespace common\models;

use common\models\MapAddress;
use Yii;

/**
 * This is the model class for table "{{%managment_company}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $address_id
 * @property string $domen
 * @property string $number
 * @property string $legal_name
 * @property string $legal_address
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 * @property string $ras_schet
 * @property string $korr_schet
 * @property string $bik
 * @property string $inn_bank
 * @property string $kpp_bank
 * @property string $ogrn_bank
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property House[] $houses
 * @property ManagmentCompanyUser[] $managmentCompanyUsers
 * @property PollQuestion[] $pollQuestions
 * @property Post[] $posts
 */
class ManagmentCompany extends \yii\db\ActiveRecord
{
    public $owner_id;
    public $addressText;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%managment_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'address_id', 'number', 'owner_id'], 'required'],
            [
                [
                    'title',
                    'addressText',
                    'legal_name',
                    'legal_address',
                    'inn',
                    'kpp',
                    'ogrn',
                    'ras_schet',
                    'korr_schet',
                    'bik',
                    'inn_bank',
                    'kpp_bank',
                    'ogrn_bank'
                ],
                'string',
                'max' => 255
            ],
            ['domen', 'url'],
            ['domen', 'unique'],
            ['number', 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'RU'],
            [
                'number',
                'filter',
                'filter' => function ($value) {
                    return str_replace([' ', '_', '-', '(', ')'], '', $value);
                }
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'address_id' => 'Address ID',
            'domen' => 'Domen',
            'number' => 'Number',
            'legal_name' => 'Legal Name',
            'legal_address' => 'Legal Address',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'ogrn' => 'Ogrn',
            'ras_schet' => 'Ras Schet',
            'korr_schet' => 'Korr Schet',
            'bik' => 'Bik',
            'inn_bank' => 'Inn Bank',
            'kpp_bank' => 'Kpp Bank',
            'ogrn_bank' => 'Ogrn Bank',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'addressText' => 'Адрес',
        ];
    }

    public function getAddress()
    {
        return $this->hasOne(MapAddress::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHouses()
    {
        return $this->hasMany(House::className(), ['managment_company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('managment_company_user',
            ['managment_company_id' => 'id']);
        //joinLeft
    }

    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->viaTable('managment_company_user',
            ['managment_company_id' => 'id']);
        //join
    }

    /*class Order extends ActiveRecord
    {
        public function getItems()
        {
            return $this->hasMany(Item::className(), ['id' => 'item_id'])
                ->viaTable('order_item', ['order_id' => 'id']);
        }
    }*/
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollQuestions()
    {
        return $this->hasMany(PollQuestion::className(), ['managment_company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['managment_company_id' => 'id']);
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->owner_id && ($owner = User::findOne($this->owner_id)) !== null) {

            /*echo "<pre>";
            print_r(ManagmentCompanyUser::findOne(['id' => 'managment_company_id', $this->owner_id => 'user_id']));
            die();
            echo "</pre>";*/
            //$this->link('managmentCompanyUsers', $owner);
        }

    }
    public function getFullAddressId()
    {
        $address = new MapAddress;
        $addressFull = $address->getFullAddressId($this->address_id);
        return $addressFull;
    }
}
