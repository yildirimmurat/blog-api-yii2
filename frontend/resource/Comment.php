<?php

namespace frontend\resource;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return [
            'id',
            'title',
            'body',
            'post_id'
        ];
    }

    public function extraFields()
    {
        return [
            'created_at',
            'crated_by',
            'updated_at'
        ];
    }
}