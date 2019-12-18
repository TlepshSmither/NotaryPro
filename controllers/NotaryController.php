<?php

namespace app\controllers;

use app\models\Login;
use yii\helpers\Url;
use Yii;
use app\models\Signup;
use app\models\UploadForm;
use yii\web\UploadedFile;

// password in katakan1@yandex.ru  -> qwerty
class NotaryController extends \yii\base\Controller
{

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionLogout(){
        Yii::$app->user->logout();
        Yii::$app->response->redirect(Yii::$app->urlManager->createAbsoluteUrl(['notary/login']));
    }

    public function actionSignup()
    {
        $model = new Signup(); // создание экземпляра класса Signup

        if (isset($_POST['Signup'])){
            $model->attributes = Yii::$app->request->post('Signup');
            // Yii:: двоеточие = вызов статичной функции
            if ($model->validate() && $model->signup())
            {
               return $this->render('index');
            }
        }

        return $this->render('signup',['model'=>$model]);
    }
    public function actionLogin(){

        $login_model = new Login();

        if(Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->render(['index']);
            }
        }
        return $this->render('login',['login_model'=>$login_model]);
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}
