<?php 
namespace app\models;
use yii;
use yii\base\Model;
use common\models\MusicForm;

class Musical extends Model
{   
	public $name;
	public $instrument;
	public $mobile;
	
    public function rules()
    {
        return [
            [['name', 'instrument','mobile'], 'required'],
            ['mobile','integer'],

        ];
    }

    public function musicsignup(){
    	$music=new MusicForm();
    	$music->name=$this->name;
    	$music->instrument=$this->instrument;
    	$music->mobile=$this->mobile;
    	return $music->save();
    }
}
?>
<?php


?>