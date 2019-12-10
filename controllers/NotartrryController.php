<?php
//
//namespace app\controllers;
//
//use Yii;
//use yii\web\Controller;
//use app\models\EntryForm;
//
//class NotaryController extends Controller {
//
//
//    public function actionIndex()
//    {
//        return $this->render('index');
//    }
//
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }
//
//    public function actionEntry()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//        $model = new EntryForm();
//        $post = Yii::$app->request->post();
//
//        if ($model->load($post)) {
//            $model->password = password_hash($model->password, PASSWORD_DEFAULT);
//            if ($model->save()) {
//                return $this->render('entry-confirm', ['model' => $model]);
//            }
//        }
//        else {
//            return $this->render('entry', ['model' => $model]);
//        }
//    }
//
//}