<?php

namespace frontend\modules\myapi\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\myapi\models\Comment]].
 *
 * @see \frontend\modules\myapi\models\Comment
 */
class CommentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\modules\myapi\models\Comment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\modules\myapi\models\Comment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
