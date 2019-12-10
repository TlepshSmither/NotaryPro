<?php

namespace app\controllers;

use app\models\Login;
use Yii;
use yii\web\Controller;
use app\models\Signup;
//use yii\filters\AccessControl;
//use yii\filters\VerbFilter;
// password in katakan1@yandex.ru  -> qwerty
class NotaryController extends \yii\base\Controller
{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionLogout(){
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            return $this->redirect('login')->send();
        }
    }

    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup'])){
            $model->attributes = Yii::$app->request->post('Signup');
            if ($model->validate() && $model->signup())
            {
               return $this->render('index');
            }
        }

        return $this->render('signup',['model'=>$model]);
    }
    public function actionLogin(){

//        if(!Yii::$app->user->isGuest)
//        {
//            return $this->goHome();
//        }

        $login_model = new Login();

        if(Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
//                return $this->goHome();
                return $this->render(['index']);
            }
        }
        return $this->render('login',['login_model'=>$login_model]);
    }

}
