<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */

namespace common\components\traits;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii;

/**
 * Class ModelImageUploadTrait
 * @package common\components\traits
 */
trait ModelImageUploadTrait
{
    /**
     * @param $path
     * @param $field_file
     * @param $field_image
     * @param $width
     * @param $height
     * @return bool
     */
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


    /**
     * @param string $image_field
     * @return string
     */
    public function getImageUrl($image_field='image')
    {
        if ($this->$image_field != null && file_exists(\Yii::getAlias('@uploads/images/') . $this->$image_field)) {
            return \Yii::getAlias('@upweb/images/') . $this->$image_field;
        }
        return \Yii::getAlias('@upweb/static/') . 'default_'.static::tableName().'.jpg';
    }

}
