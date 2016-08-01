<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;
/**
 * Signup form
 */
class SignupForm extends Model
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public $username;
    public $email;
    public $password;
    public $password_confirm;
    public $birthday_formatted;
    public $role = "user";
    public $last_name;
    public $first_name;
    public $middle_name;
    public $date_of_birth;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'birthday_formatted',
                    ActiveRecord::EVENT_AFTER_FIND => 'birthday_formatted',
                ],
                'timeAttribute' => 'date_of_birth'
            ]
        ];
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [
                [
                    'username',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'email'
                ],
                'string',
                'max' => 255
            ],
            [['date_of_birth'], 'integer'],
            ['birthday_formatted', 'date', 'format' => 'php:d.m.Y'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['password'], 'safe'],
            [['password', 'password_confirm'], 'required', 'on' => 'register'],
            ['email', 'email'],
            ['password', 'string', 'min' => 8, 'on' => 'register'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'on' => 'register'],
            ['username', 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'RU'],
            [
                'username',
                'filter',
                'filter' => function ($value) {
                    return str_replace([' ', '_', '-', '(', ')'], '', $value);
                }
            ],

        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->last_name = $this->last_name;
        $user->date_of_birth = $this->date_of_birth;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        return $user->save() ? $user : null;
    }
}
