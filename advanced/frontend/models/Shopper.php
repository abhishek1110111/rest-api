<?php 
namespace frontend\models;
use yii;
use yii\base\Model;
use common\models\Shopping;

class Shopper extends Model
{   
	public $name;
	public $product;
	public $size;
	
    public function rules()
    {
        return [
            [['name', 'product','size'], 'required'],
            

        ];
    }

    public function createsignup(){
    	$shop=new Shopping();
    	$shop->name=$this->name;
    	$shop->product=$this->product;
    	$shop->size=$this->size;
    	return $shop->save();
    }
}
