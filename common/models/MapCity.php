<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "{{%map_city}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property MapAddress[] $mapAddresses
 */
class MapCity extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'ensureUnique' => 'true',
                'immutable' => 'true',
                //'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%map_city}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapAddresses()
    {
        return $this->hasMany(MapAddress::className(), ['city_id' => 'id']);
    }
}
