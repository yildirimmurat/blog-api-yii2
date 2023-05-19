<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use \frontend\resource\Post;

class PostController extends ActiveController
{
    public $modelClass = Post::class;
}