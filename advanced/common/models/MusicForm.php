<?php
namespace common\models;

use yii\db\ActiveRecord;

class MusicForm extends ActiveRecord
{
	public static function tableName()
    {
        return '{{%MusicForm}}';
    }
}