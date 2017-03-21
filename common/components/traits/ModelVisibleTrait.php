<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 * Date: 22.03.2017
 * Time: 1:19
 */
namespace common\components\traits;

trait ModelVisibleTrait
{
    /**
     * @return bool
     */
    public function toggleVisible()
    {
        $this->visible = $this->visible ? 0 : 1;
        return $this->save();
    }

}