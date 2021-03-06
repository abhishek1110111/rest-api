<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin() ?>
    <?= $form->field($model, 'title')->textInput(['value' => $data['title']]); ?>
    <?= $form->field($model, 'body')->textInput(['value' => $data['body']]); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>