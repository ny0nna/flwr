<?php

namespace app\models;

use Yii;
use app\models\User;

class RegForm extends User
{
    public $confirm_password;
    public $agree;
    public function rules()
    {
        return [
            [['name', 'surname','login', 'email', 'password','confirm_password','agree'], 'required'],
            [['is_admin'], 'integer'],
            [['name','surname','patronymic'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{1,}$/u',
                'message'=>'Используйте минимум 1 русскую букву'],
            [['password'], 'match', 'pattern'=>'/^[A-Za-z0-9\D]{5,}/',
                'message'=>'Используйте минимум 5 латинских букв и цифр'],
            [['email'], 'email'],
            [['confirm_password'], 'compare',
                'compareAttribute'=>'password'],
            [['email'], 'unique'],
            [['login'], 'unique'],
            [['agree'], 'compare', 'compareValue'=>true,
                'message'=>''],

            [['name', 'surname', 'patronymic', 'login', 'email', 'password','confirm_password'], 'string', 'max' => 100],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество (необязательное поле)',
            'email' => 'Почта',
            'login' => 'Логин',
            'password' => 'Пароль',
            //'is_admin' => 'Is Admin',
            'confirm_password' => 'Повторите пароль',
            'agree' => 'Подтвердите согласие на обработку персональных данных',
 ];
 }
}
