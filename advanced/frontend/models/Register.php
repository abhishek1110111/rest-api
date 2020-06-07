<?php 
namespace frontend\models;

use yii\db\ActiveRecord;

class Register extends ActiveRecord{

}

// get all rows from the country table and order them by "name"
// $countries = Register::find()->orderBy('name')->all();

// get the row whose primary key is "US"
// $country = Register::findOne('US');

// displays "United States"
// echo $countries->name;

// modifies the country name to be "U.S.A." and save it to database
// $country->name = 'U.S.A.';
// $country->save();