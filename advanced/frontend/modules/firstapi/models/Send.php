<?php 
namespace frontend\modules\firstapi\models;

use Yii;
use yii\base\Model;

class Send extends Model
{
	public $title;
	public $body;

	public function rules()
	{
		return [
            [['title', 'body'], 'required'],
            

        ];
	}
}