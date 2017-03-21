<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 * Date: 21.03.2017
 * Time: 20:07
 */

namespace backend\components\widgets;


use sjaakp\symbolpicker\SymbolPicker;


class CustomSymbolPicker extends SymbolPicker
{
    public $labels = [
        'icon' => 'Icon',
        'effect' => 'Effect',
    ];
}