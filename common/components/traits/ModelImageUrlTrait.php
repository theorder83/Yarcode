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
     * @return mixed
     */
    public function getImageUrl()
    {
        if ($this->image != null && file_exists(\Yii::getAlias('@uploads/images/') . $this->image)) {
            return \Yii::getAlias('@upweb/images/') . $this->image;
        }
        return \Yii::getAlias('@upweb/images/') . 'default_'.static::tableName().'.jpg';
    }

}

