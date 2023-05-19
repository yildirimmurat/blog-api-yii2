<?php

namespace frontend\resource;

use common\models\query\CommentQuery;
use yii\db\ActiveQuery;

class Post extends \common\models\Post
{
    public function fields(): array
    {
        return [
            'id',
            'title',
            'body'
        ];
    }

    public function extraFields(): array
    {
        return [
            'created_at',
            'crated_by',
            'updated_at',
            'comments',
            'createdBy'
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

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy(): \common\models\query\UserQuery|ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}