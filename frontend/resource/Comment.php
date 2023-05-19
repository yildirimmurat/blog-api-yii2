<?php

namespace frontend\resource;

use common\models\query\PostQuery;
use yii\db\ActiveQuery;

class Comment extends \common\models\Comment
{
    public function fields(): array
    {
        return [
            'id',
            'title',
            'body',
        ];
    }

    public function extraFields(): array
    {
        return [
            'post_id',
            'created_at',
            'crated_by',
            'updated_at',
            'post',
            'createdBy'
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