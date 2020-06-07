<?php

namespace frontend\modules\api\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "employee".
 *
 * @property int $empid
 * @property string $empname
 * @property string $empdesignation
 * @property string $empdepartment
 */
class Employee extends ActiveRecord
{   const SCENARIO_CREATE= 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empname', 'empdesignation', 'empdepartment'], 'required'],
            [['empname', 'empdesignation', 'empdepartment'], 'string', 'max' => 40],
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create']=['empname','empdesignation','empdepartment'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empid' => 'Empid',
            'empname' => 'Empname',
            'empdesignation' => 'Empdesignation',
            'empdepartment' => 'Empdepartment',
        ];
    }
}
