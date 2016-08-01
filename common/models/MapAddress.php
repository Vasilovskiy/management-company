<?php

namespace common\models;


use yii\db\Expression;
use Yii;
use deka6pb\geocoder\Geocoder;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%map_address}}".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $street_id
 * @property integer $house_id
 * @property string $point
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property House[] $houses
 * @property MapCity $city
 * @property MapCountry $country
 * @property MapHouse $house
 * @property MapStreet $street
 */
class MapAddress extends \yii\db\ActiveRecord
{
    public $countryName;
    public $cityName;
    public $streetName;
    public $houseName;
    public $lat;
    public $lon;


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function find()
    {
        return parent::find()->select('{{%map_address}}.*, X(point) as lat, Y(point) as lon');
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%map_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'city_id', 'street_id', 'house_id'], 'required'],
            [['country_id', 'city_id', 'street_id', 'house_id'], 'integer'],
            [['point'], 'safe'],
            [
                ['city_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => MapCity::className(),
                'targetAttribute' => ['city_id' => 'id']
            ],
            [
                ['country_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => MapCountry::className(),
                'targetAttribute' => ['country_id' => 'id']
            ],
            [
                ['house_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => MapHouse::className(),
                'targetAttribute' => ['house_id' => 'id']
            ],
            [
                ['street_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => MapStreet::className(),
                'targetAttribute' => ['street_id' => 'id']
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
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'street_id' => 'Street ID',
            'house_id' => 'House ID',
            'point' => 'Point',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'fulladdress' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHouses()
    {
        return $this->hasMany(House::className(), ['address_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(MapCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(MapCountry::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHouse()
    {
        return $this->hasOne(MapHouse::className(), ['id' => 'house_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(MapStreet::className(), ['id' => 'street_id']);
    }

    public function findSelf($address)
    {
        $coder = Geocoder::build(Geocoder::TYPE_YANDEX);
        $object = $coder::findOneByAddress($address);
        $points = $object->point;
        /*echo "<pre>";
        print_r($object);
        die();
        echo "</pre>";*/
        if (!$object || $object->type != 'house') {
            return null;
        }

        /*echo "<pre>";
            print_r($object);
            die();
        echo "</pre>";*/


        $findCountry = MapCountry::find()->where(['name' => $object->data['country']])->one();
        if (!$findCountry) {
            $findCountry = new MapCountry;
            $findCountry->name = $object->data['country'];
            $findCountry->save();
        }
        $this->country_id = $findCountry->id;
        $this->populateRelation('country', $findCountry);
        $this->countryName = $findCountry->name;

        $findCity = MapCity::find()->where(['name' => $object->data['city']])->one();
        if (!$findCity) {
            $findCity = new MapCity;
            $findCity->name = $object->data['city'];
            $findCity->save();
        }
        $this->city_id = $findCity->id;
        $this->populateRelation('city', $findCity);
        $this->cityName = $findCity->name;

        $findStreet = MapStreet::find()->where(['name' => $object->data['street']])->one();
        if (!$findStreet) {
            $findStreet = new MapStreet;
            $findStreet->name = $object->data['street'];
            $findStreet->save();
        }
        $this->street_id = $findStreet->id;
        $this->populateRelation('street', $findStreet);
        $this->streetName = $findStreet->name;

        $findHouse = MapHouse::find()->where(['name' => $object->data['house']])->one();
        if (!$findHouse) {
            $findHouse = new MapHouse;
            $findHouse->name = $object->data['house'];
            $findHouse->save();
        }
        $this->house_id = $findHouse->id;
        $this->populateRelation('house', $findHouse);
        $this->houseName = $findHouse->name;

        $findAddress = MapAddress::findOne([
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'street_id' => $this->street_id,
            'house_id' => $this->house_id
        ]);

        if (!$findAddress) {

            $findAddress = new MapAddress;
            $findAddress->country_id = $this->country_id;
            $findAddress->city_id = $this->city_id;
            $findAddress->street_id = $this->street_id;
            $findAddress->house_id = $this->house_id;
            $findAddress->point = new Expression("POINT({$points->latitude},{$points->longitude})");

            $findAddress->save();
        }
        $this->lat = $points->latitude;
        $this->lat = $points->longitude;

        return $findAddress->id;
    }

    public function getFullAddressId($address_id)
    {
        $address = MapAddress::findOne($address_id);
        $city = MapStreet::findOne($address->city_id);
        $street = MapStreet::findOne($address->street_id);
        $house = MapHouse::findOne($address->house_id);

        return $city->name . ", " . $street->name . ", " . $house->name;
    }

    public function getFullAddress()
    {
        return $this->country->name . ', ' . $this->city->name . ', ' . $this->street->name . ' ' . $this->house->name;
    }
}
