<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $department_id
 * @property int $branches_branch_id
 * @property string $department_name
 * @property int $companies_company_id
 * @property string $department_created_data
 */
class department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id', 'branches_branch_id', 'department_name', 'companies_company_id', 'department_created_data'], 'required'],
            [['department_id', 'branches_branch_id', 'companies_company_id'], 'integer'],
            [['department_created_data'], 'safe'],
            [['department_name'], 'string', 'max' => 100],
            [['department_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'branches_branch_id' => 'Branches Branch ID',
            'department_name' => 'Department Name',
            'companies_company_id' => 'Companies Company ID',
            'department_created_data' => 'Department Created Data',
        ];
    }
}
