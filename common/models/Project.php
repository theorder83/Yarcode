<?php

namespace common\models;

use common\components\ActiveRecord;
use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelImageUrlTrait;
use common\components\traits\ModelVisibleTrait;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $title
 * @property string $description_title
 * @property string $text
 * @property string $preview
 * @property string $image
 * @property string $position
 * @property int $visible
 */
class Project extends ActiveRecord
{
    public $file_preview;
    public $file_image;

    use ModelVisibleTrait;
    use ModelImageUrlTrait;

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
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'description_title', 'text'], 'required'],
            [['description', 'description_title', 'text'], 'string'],
            [['name', 'title'], 'string', 'max' => 256],
            [['file_image', 'file_preview'], 'file', 'extensions' => 'png, jpg'],
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
            'title' => 'Title',
            'description_title' => 'Description Title',
            'text' => 'Text',
            'preview' => 'Preview',
            'image' => 'Image',
            'position' => 'Position',
            'visible' => 'Visible',
            'file_preview' => 'Preview',
            'file_image' => 'Image',
        ];
    }


    public function saveImage($path, $field_file, $field_image, $width, $height)
    {
        if (!isset($this->$field_file) ) {
            return true;
        }

        $file = UploadedFile::getInstance($this, $field_file);

        if ($file && $file->tempName) {
            $this->$field_file = $file;

            if ($this->validate([$field_file])) {

                if ($this->$field_image != null && file_exists(Yii::getAlias($path . $this->$field_image))) {
                    unlink(Yii::getAlias($path . $this->$field_image));
                    $this->$field_image = '';
                }

                $fileName = Yii::$app->security->generateRandomString() . '.' . $this->$field_file->extension;
                if ($this->$field_file->saveAs($path . $fileName)) {
                    $this->$field_file = $fileName;
                    $this->$field_image = $fileName;

                    $size = new Box($width, $height);
                    $mode = ImageInterface::THUMBNAIL_OUTBOUND;

                    $photo = Image::getImagine()->open($path . $fileName);
                    $photo->thumbnail($size, $mode)->save($path . $fileName, ['quality' => 100]);
                    return true;
                }
            }
        }

        return false;
    }

    public function afterDelete()
    {
        $file = file_exists(\Yii::getAlias('@uploads/images/') . $this->image);
        if ($this->image != null && file_exists($file)) {
            unset($file);
        }

        $file = file_exists(\Yii::getAlias('@uploads/images/') . $this->preview);
        if ($this->preview != null && file_exists($file)) {
            unset($file);
        }
    }
}
