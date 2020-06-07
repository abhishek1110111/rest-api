<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->instrument) ?></li>
     <li><label>Email</label>: <?= Html::encode($model->mobile) ?></li>
</ul>
<?php
$form = ActiveForm::begin() ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'instrument') ?>
    <?= $form->field($model, 'mobile') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
