<?php

namespace frontend\controllers;

class SPController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
