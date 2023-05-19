<?php

namespace frontend\resource;

use common\models\query\CommentQuery;
use yii\db\ActiveQuery;

class Post extends \common\models\Post
{
    public function fields()
    {
        return [
            'id',
            'title',
            'body'
        ];
    }

    public function extraFields()
    {
        return [
            'comments',
            'created_at',
            'crated_by',
            'updated_at'
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return CommentQuery|ActiveQuery
     */
    public function getComments(): CommentQuery|ActiveQuery
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}