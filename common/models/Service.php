<?php

namespace common\models;

use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelVisibleTrait;
use yii\db\ActiveRecord;
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

    use ModelVisibleTrait;

    public function behaviors()
    {
        return [
            ModelPositionBehavior::className(),
        ];
    }

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






}
