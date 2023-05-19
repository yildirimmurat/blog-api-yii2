<?php

namespace common\models\query;

use yii\db\ActiveQuery;
use common\models\Post;

/**
 * This is the ActiveQuery class for [[\common\models\Post]].
 *
 * @see \common\models\Post
 */
class PostQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Post[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Post|array|null
     */
    public function one($db = null): Post|array|null
    {
        return parent::one($db);
    }
}
