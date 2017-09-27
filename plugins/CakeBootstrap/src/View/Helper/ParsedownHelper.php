<?php
namespace CakeBootstrap\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use MayMeow\Helpers\MeowDown;
use MayMeow\Helpers\Parsedown;

/**
 * Parsedown helper
 */
class ParsedownHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function parse($text = null)
    {
        $pd = new MeowDown();

        return $pd->text($text);
    }
}
