<?php
namespace CakeBootstrap\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Emojione\Client;
use Emojione\Ruleset;

/**
 * Emoji helper
 */
class EmojiHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function parse($text = null)
    {
        $em = new Client(new Ruleset());

        return $em->shortnameToUnicode($text);
    }

}
