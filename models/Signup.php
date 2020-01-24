<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $typeUser;

    public function rules()
    {
        return[
            [['email','password','typeUser'], 'required'],
            ['email','email'],
            ['email','unique', 'targetClass' => 'app\models\User'],
            ['password','string', 'min' => 2,'max' => 10],
        ];
    }
    public function signup(){
        $user = new User(); //создаём объект нового пользователя
        $user->email = $this->email; // заполняем данные пользователя в базу данных
        $user->typeUser = $this->typeUser; // заполняем данные пользователя в базу данных
        $user->setPassword($this->password);
      // $user->password = password_hash($this->password, PASSWORD_DEFAULT); //кидаем пароль и хэшируем его
        return $user->save();

    }
}