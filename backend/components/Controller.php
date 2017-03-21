<?php

namespace backend\components;

use yii\filters\AccessControl;

class Controller extends \yii\web\Controller
{

    const TYPE_MOVE_UP = 1;
    const TYPE_MOVE_DOWN = 2;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}