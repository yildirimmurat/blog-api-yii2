<?php

namespace common\models\query;

use yii\db\ActiveQuery;
use common\models\Comment;

/**
 * This is the ActiveQuery class for [[\common\models\Comment]].
 *
 * @see \common\models\Comment
 */
class CommentQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Comment[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Comment|array|null
     */
    public function one($db = null): Comment|array|null
    {
        return parent::one($db);
    }
}
