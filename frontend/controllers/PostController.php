<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = \frontend\resource\Post::class;
}