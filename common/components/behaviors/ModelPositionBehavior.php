<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 * Date: 21.03.2017
 * Time: 21:15
 */

namespace common\components\behaviors;

use yii\web\NotFoundHttpException;
use yii\base\UnknownMethodException;
use yii\base\UnknownPropertyException;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class ModelPositionBehavior extends Behavior
{

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    /**
     * @return bool
     * @throws UnknownPropertyException
     */
    public function isTopPosition()
    {
        if(!isset($this->owner)||!isset($this->owner->position)){
            throw new UnknownPropertyException ("Property not found");
        }

        return $this->owner->position == 1;
    }

    /**
     * @return bool
     * @throws UnknownPropertyException
     */
    public function isBottomPosition()
    {
        if(!isset($this->owner)||!isset($this->owner->position)){
            throw new UnknownPropertyException ("Property not found");
        }

        return $this->owner->position == $this->owner->find()->count();
    }

    /**
     * @return int
     */
    public function updatePositions()
    {
        // TODO: fix this
        $list = $this->owner->find()->orderBy('position')->all();

        $i = 1;
        foreach ($list as $item) {
            $item->updateAttributes(['position' => $i]);
            $i++;
        }
    }

    /**
     * @param $event
     * @throws UnknownPropertyException
     * @throws UnknownMethodException
     */
    public function afterDelete($event)
    {
        if(!isset($this->owner)){
            throw new UnknownPropertyException ("Property not found");
        }

        if (!is_callable($this->owner,'updatePositions')){
            throw new UnknownMethodException("Method not found");
        }

        $this->model->updatePositions();
    }

    /**
     * @param $id
     * @return bool
     * @throws NotFoundHttpException
     * @throws UnknownPropertyException
     */
    public function swapPosition($id)
    {
        if(!isset($this->owner)||!isset($this->owner->position)){
            throw new UnknownPropertyException ("Property not found");
        }

        if (($model = $this->owner->findOne($id)) == null) {
            throw new NotFoundHttpException("Model not found");
        }

        $temp = $this->owner->position;
        $this->owner->position = $model->position;
        $model->position = $temp;

        return $model->save() && $this->owner->save();
    }
}