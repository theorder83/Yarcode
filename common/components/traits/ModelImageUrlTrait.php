<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 * Date: 23.03.2017
 * Time: 14:13
 */

namespace common\components\traits;

trait ModelImageUrlTrait
{
    /**
     * @param string $image_field
     * @return string
     */
    public function getImageUrl($image_field='image')
    {
        if ($this->$image_field != null && file_exists(\Yii::getAlias('@uploads/images/') . $this->$image_field)) {
            return \Yii::getAlias('@upweb/images/') . $this->$image_field;
        }
        return \Yii::getAlias('@upweb/images/') . 'default_'.static::tableName().'.jpg';
    }

}

