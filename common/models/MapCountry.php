<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%map_country}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property MapAddress[] $mapAddresses
 */
class MapCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%map_country}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapAddresses()
    {
        return $this->hasMany(MapAddress::className(), ['country_id' => 'id']);
    }
}
