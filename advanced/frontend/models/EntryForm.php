<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}
?>
<?php
$model = new MusicForm();
$model->name = $_POST['name'];
$model->email = $_POST['instrument'];
if ($model->validate()) {
    // Good!
} else {
    // Failure!
    // Use $model->getErrors()
}
?>