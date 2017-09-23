<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Svg helper
 */
class SvgHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    const SVG_ROOT = WWW_ROOT . 'svg' . DS;

    public function cakeappIcon($options = [])
    {
        $icon = '<span style="width: ' . $options['width'] . '; height: ' . $options['height'] . '; display: inline-block; position: relative;">';
        $icon .= file_get_contents(static::SVG_ROOT . 'cakeapp.svg');
        $icon .= '</span>';

        return $icon;
    }

    public function cakeappIconWhite($options = [])
    {
        $icon = '<span style="width: ' . $options['width'] . '; height: ' . $options['height'] . '; display: inline-block">';
        $icon .= file_get_contents(static::SVG_ROOT . 'cakeapp-white.svg');
        $icon .= '</span>';

        return $icon;
    }

    public function icon($name, $options = [])
    {
        $icon = '<span style="width: ' . $options['width'] . '; height: ' . $options['height'] . '; display: inline-block">';
        $icon .= file_get_contents(static::SVG_ROOT . $name . '.svg');
        $icon .= '</span>';

        return $icon;
    }

}
