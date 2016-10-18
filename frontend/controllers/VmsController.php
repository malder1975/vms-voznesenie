<?php

namespace frontend\controllers;

use yii\web\Controller;

class VmsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}
