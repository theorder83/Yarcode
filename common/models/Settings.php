<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */

namespace common\models;


use yii\base\Model;

class Settings extends Model
{
    public $siteName, $siteDescription, $siteTitle, $siteCopyright,
        $metaDescription, $metaKeywords,
        $siteFacebook, $siteTwitter, $siteLinkedin;


    public function rules()
    {
        return [
            [[
                'siteName',
                'siteDescription',
                'siteTitle',
                'siteCopyright',
                'metaDescription',
                'metaKeywords',
                'siteFacebook',
                'siteLinkedin',
                'siteTwitter',
            ], 'required'],
        ];
    }


}