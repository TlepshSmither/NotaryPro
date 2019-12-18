<?php
namespace app\models;

use yii\base\Model;

class Login extends Model {
    public $email;
    public $password;


    public function rules()
    {
        return[
            [['email','password'], 'required'],
            ['email','email'],
            ['password','validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params){
        if($this->hasErrors()){ // если нет ошибки в валидации

            $user=$this->getUser(); // получаем пользователя для дальнейшего сравнения пароля

//            if(!$user || !$user->validatePassword($this->password)){
//                // если не находим в базе данных такого пользователя
//                // или пароль в базе не найден
//                $this->addError($attribute, 'Password or User not find!');
//                // добавляем новую ошибку для аттрибута password что User не найден
//            }
        }
    }
    public function getUser(){
        return User::findOne(['email'=>$this->email]); // получаем пользователя по его емэйлу
    }

}