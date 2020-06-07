<?php 
namespace common\models;

use yii\db\ActiveRecord;

class Shopping extends ActiveRecord
{
	public static function tableName()
    {
        return '{{%shopping}}';
    }
}
?>