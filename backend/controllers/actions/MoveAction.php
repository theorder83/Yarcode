<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */

namespace backend\controllers\actions;


use yii\base\Action;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class MoveAction extends Action
{
    /**
     * @var ActiveRecord
     */
    public $model_class;

    public function run($id, $type)
    {
        if (($a = ($this->model_class)::findOne($id)) == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $inc = null;
        switch ($type){
            // TODO: fix !!! change CONST
            case 1:
                $inc = -1;
                break;
            case 2:
                $inc = 1;
                break;
            default:
                throw new InvalidParamException("Wrong param: type");
        }

        if (($b = ($this->model_class)::findOne(['position' => $a->position + $inc])) == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $a->swapPosition($b->id);

        return $this->controller->redirect(['index']);
    }

}