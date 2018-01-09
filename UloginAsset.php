<?php
/**
 * @link https://github.com/Konstantin-Vl/yii2-ulogin-widget
 * @copyright Copyright (c) 2016 Konstantin Voloshchuk
 * @license https://github.com/Konstantin-Vl/yii2-ulogin-widget/blob/master/LICENSE
 */

namespace kosv\ulogin\widget;

use yii\web\AssetBundle;

/**
 * Ulogin widget asset bundle.
 *
 * @author Konstantin Voloshchuk <kosv.dev@gmail.com>
 * @since 2.0
 */
class UloginAsset extends AssetBundle
{
    public $js = [
        '//ulogin.ru/js/ulogin.js'
    ];
}