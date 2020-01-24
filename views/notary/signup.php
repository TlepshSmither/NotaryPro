<h1>Registratio</h1>
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'email')->textInput(['autofocus'=>true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'typeUser')->dropDownList(['1'=> 'notary', '2'=>'client'],
['prompt' => 'Choose your role']) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>