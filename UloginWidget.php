<?php
/**
 * @link https://github.com/Konstantin-Vl/yii2-ulogin-widget
 * @copyright Copyright (c) 2016 Konstantin Voloshchuk
 * @license https://github.com/Konstantin-Vl/yii2-ulogin-widget/blob/master/LICENSE
 */

namespace kosv\ulogin\widget;

use Yii;
use yii\base\Widget;
use kosv\ulogin\widget\UloginAsset;


/**
 * Ulogin widget for yii2.
 *
 * @author Konstantin Voloshchuk <kosv.dev@gmail.com>
 * @since 2.0
 */
class UloginWidget extends Widget
{
    /**
     * @var array Layouts buttons
     * @see http://ulogin.ru/help.php#buttons
     */
    public $buttons = [];

    /**
     * @var string HTML The class attribute
     * @see http://htmlbook.ru/html/attr/class
     */
    public $classAttr = '';

    /**
     * @var array Js event handlers
     * @see https://ulogin.ru/help.php#listeners
     */
    public $eventListeners = [];

    /**
     * @var array Ulogin options
     * @see https://ulogin.ru/help.php
     */
    public $options = [];

    /**
     * @var string Ulogin init buttons
     */
    private $_initButtons;
    /**
     * @var string Ulogin init options
     */
    private $_initOptions;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $initOptions = '';
        foreach ($this->options as $option => $value) {
            if (is_array($value)) {
                $initOptions .= $option . '=' . implode(',', $value) . ';';
            } else {
                $initOptions .= $option . '=' . $value . ';';
            }
        }

        $initButtons = [];
        foreach ($this->buttons as $button) {
            $data = "data-uloginbutton=\"{$button['provider']}\"";
            $initButtons[] = $button['layout']($data);
        }

        $this->_initOptions = $initOptions;
        $this->_initButtons = $initButtons;


        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        UloginAsset::register($this->getView());

        //Register event listeners
        foreach ($this->eventListeners as $event => $listener) {
            $this->setStateListener($event, $listener);
        }

        return $this->render('widget', [
            'class' => $this->classAttr,
            'buttons' => $this->_initButtons,
            'id' => $this->id,
            'initOptions' => $this->_initOptions,
        ]);
    }

    /**
     * Sets the event handler in the event ulogin
     *
     * @param string $event Js event name
     * @param string $listener Js event handler
     * @return $this
     * @see https://ulogin.ru/help.php#listeners
     */
    public function setStateListener($event, $listener)
    {
        $js = sprintf(
            'uLogin.setStateListener(%s, %s, %s);',
            $this->id,
            $event,
            $listener
        );

        $this->getView()->registerJs($js);
        return $this;
    }
}