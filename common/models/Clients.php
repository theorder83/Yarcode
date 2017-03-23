<?php

namespace common\models;


use common\components\ActiveRecord;
use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelVisibleTrait;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string $datetime
 */
class Clients extends ActiveRecord
{
    public $file;

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
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['link'], 'url'],
            [['file'], 'file', 'extensions' => 'png, jpg'],

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
            'link' => 'Link',
        ];
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        if ($this->image != null && file_exists(\Yii::getAlias('@uploads/images/clients/') . $this->image)) {
            return \Yii::getAlias('@upweb/images/clients/') . $this->image;
        }

        return '@upweb/images/clients/' . 'default_client.jpg';
    }
}
