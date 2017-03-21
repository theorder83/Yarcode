<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property string $position
 * @property integer $visible
 * @property string $datetime
 */
class Service extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['position', 'visible'], 'integer'],
            [['datetime'], 'safe'],
            [['name', 'icon'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'icon' => 'Icon',
            'position' => 'Position',
            'visible' => 'Visible',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @param $id
     * @return bool
     * @throws NotFoundHttpException
     */
    public function swapPosition($id)
    {
        if (($model = self::findOne($id)) == null) {
            throw new NotFoundHttpException("Model not found");
        }

        $temp = $this->position;
        $this->position = $model->position;
        $model->position = $temp;

        return $model->save() && $this->save();
    }

    /**
     * @return bool
     */
    public function toggleVisible()
    {
        $this->visible = $this->visible ? 0 : 1;
        return $this->save();
    }

    /**
     * @return bool
     */
    public function isTopPosition()
    {
        return $this->position == 1;
    }

    /**
     * @return bool
     */
    public function isBottomPosition()
    {
        return $this->position == Service::find()->count();
    }

    /**
     * @return int
     */
    public static function updatePositions()
    {
        // TODO: fix this
        $list = self::find()->orderBy('position')->all();

        $i = 1;
        foreach ($list as $item) {
            $item->updateAttributes(['position' => $i]);
            $i++;
        }
    }

}
