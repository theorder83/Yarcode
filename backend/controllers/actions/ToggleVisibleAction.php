<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */

namespace backend\controllers\actions;


use yii\base\Action;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class ToggleVisibleAction extends Action
{
    /**
     * @var ActiveRecord
     */
    public $model_class;

    public function run($id)
    {
        if (($model = ($this->model_class)::findOne($id)) == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model->toggleVisible();

        return $this->controller->redirect(['index']);
    }

}