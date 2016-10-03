<?php

namespace frontend\controllers;

use yii\web\Controller;

class SPController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
