<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class OurComponent extends Component
{
	public function welcome()
	{
		echo "Welcome to MyComponent";
	}
}