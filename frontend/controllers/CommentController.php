<?php

namespace frontend\controllers;

use frontend\resource\Comment;
use yii\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = Comment::class;
}