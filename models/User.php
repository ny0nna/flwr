<?php

namespace app\models;

use Yii;
use \yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $is_admin
 *
 * @property Chart[] $charts
 * @property Order[] $orders
 * @property Prod[] $prods
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id_user)
    {
        return static::findOne($id_user);
       // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);

        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

   
    public static function findByLogin($login)
    {
        return self::find()->where(['login'=> $login])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return;
        //return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return;
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password==$password;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'required'],
            [['is_admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 100],
            [['email','login'],'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Ваш ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'is_admin' => 'Админка',
        ];
    }

    /**
     * Gets query for [[Charts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharts()
    {
        return $this->hasMany(Chart::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Prods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProds()
    {
        return $this->hasMany(Prod::class, ['id_prod' => 'id_prod'])->viaTable('chart', ['id_user' => 'id_user']);
    }
}
