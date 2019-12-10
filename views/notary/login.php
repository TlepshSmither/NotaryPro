<h1>Login</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($login_model, 'email')->textInput(['autofocus'=>true]) ?>

<?= $form->field($login_model, 'password')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>