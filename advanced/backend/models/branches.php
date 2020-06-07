<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $branch_id
 * @property int $companies_company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_created_data
 */
class branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id', 'companies_company_id', 'branch_name', 'branch_address', 'branch_created_data'], 'required'],
            [['branch_id', 'companies_company_id'], 'integer'],
            [['branch_created_data'], 'safe'],
            [['branch_name'], 'string', 'max' => 100],
            [['branch_address'], 'string', 'max' => 255],
            [['branch_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'companies_company_id' => 'Companies Company ID',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_created_data' => 'Branch Created Data',
        ];
    }
}
