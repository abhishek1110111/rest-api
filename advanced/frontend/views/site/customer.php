<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

// $this->title = 'Signup';
// $this->params['breadcrumbs'][] = $this->title;
?>

<h2>Customer Registration Form</h2>
<div class="row">
   <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]); ?>
                <?= $form->field($model, 'password')->passwordInput(); ?>
                <?= $form->field($model, 'customername'); ?>
                <?= $form->field($model, 'customerplan'); ?>
                <div class="form-group">
                    <?= Html::submitButton('signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']); ?>
                </div>

            <?php ActiveForm::end(); ?>
   </div>
</div><!-- form -->