<?php

namespace frontend\resource;

use common\models\query\PostQuery;
use yii\db\ActiveQuery;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return [
            'id',
            'title',
            'body',
        ];
    }

    public function extraFields()
    {
        return [
            'post_id',
            'created_at',
            'crated_by',
            'updated_at',
            'post'
        ];
    }


    /**
     * Gets query for [[Post]].
     *
     * @return PostQuery|ActiveQuery
     */
    public function getPost(): PostQuery|ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}