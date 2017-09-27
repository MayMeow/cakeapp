<?php
/**
 * Rocket.CMS : Your Social CMS (http://rocketcms.eu)
 * Copyright (c) Martin Kukolos (http://kukolos.eu)
 *
 * For full copyright and licence information, please see the LICENCE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright Copyright (c) Martin Kukolos (http://kukolos.eu)
 * @link http://rocketcms.eu The Rocket CMS Project
 * @since 0.1.0
 * @licence http://rocketcms.eu/licence
 *
 * @author Martin
 * @created 2.6.16 19:53
 */

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 31. 5. 2016
 * Time: 9:09
 */

namespace CakeBootstrap\View\Widget;

use CakeBootstrap\View\Widget\InputgroupTrait;
use Cake\View\Form\ContextInterface;

class TextareaWidget extends \Cake\View\Widget\TextareaWidget
{
    use InputgroupTrait;
    /**
     * Render a text area form widget.
     *
     * Data supports the following keys:
     *
     * - `name` - Set the input name.
     * - `val` - A string of the option to mark as selected.
     * - `escape` - Set to false to disable HTML escaping.
     * - `append` Append addon to input.
     * - `prepend` Prepend addon to input.
     *
     * All other keys will be converted into HTML attributes.
     *
     * @param array $data The data to build a textarea with.
     * @param \Cake\View\Form\ContextInterface $context The current form context.
     * @return string HTML elements.
     */
    public function render(array $data, ContextInterface $context)
    {
        return $this->_withInputGroup($data, $context);
    }
}
