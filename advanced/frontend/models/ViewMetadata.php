<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class ViewMetadata extends Model
{
    public function metaInformation()
    {
        $cons = Yii::$app->db; //database connection
        $dbSchema = $cons->schema;
        $datas = $dbSchema->getTableSchemas('yii2_advanced', $refresh = false);

        return $datas;
    }
}
