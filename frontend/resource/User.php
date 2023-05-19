<?php

namespace frontend\resource;

class User extends \common\models\User
{
    public function fields(): array
    {
        return [
            'id',
            'username',
            'email'
        ];
    }

    public function extraFields(): array
    {
        return [
            'created_at',
            'updated_at'
        ];
    }
}