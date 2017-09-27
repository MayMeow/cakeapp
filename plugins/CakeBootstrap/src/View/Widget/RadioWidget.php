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
 * @created 31.5.16 9:07
 */

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 31. 5. 2016
 * Time: 9:07
 */

namespace CakeBootstrap\View\Widget;

use Cake\View\Form\ContextInterface;

class RadioWidget extends \Cake\View\Widget\RadioWidget
{
    /**
     * Set on `RadioWidget::render()` to tell `RadioWidget::_renderLabel()`
     * that we want to have inline aligned radios.
     *
     * @var bool
     */
    protected $_inline = false;

    /**
     * Render a set of radio buttons.
     *
     * Data supports the following keys:
     *
     * - `name` - Set the input name.
     * - `inline` - The alignement to use.
     * - `options` - An array of options. See below for more information.
     * - `disabled` - Either true or an array of inputs to disable.
     *    When true, the select element will be disabled.
     * - `val` - A string of the option to mark as selected.
     * - `label` - Either false to disable label generation, or
     *   an array of attributes for all labels.
     * - `required` - Set to true to add the required attribute
     *   on all generated radios.
     * - `idPrefix` Prefix for generated ID attributes.
     *
     * @param array $data The data to build radio buttons with.
     * @param \Cake\View\Form\ContextInterface $context The current form context.
     * @return string
     */
    public function render(array $data, ContextInterface $context)
    {
       $data += [
           'inline' => false,
       ];
       $this->_inline = $data['inline'];
       return parent::render($data, $context);
    }
    
    /**
     * Renders a label element for a given radio button.
     *
     * In the future this might be refactored into a separate widget as other
     * input types (multi-checkboxes) will also need labels generated.
     *
     * @param array $radio The input properties.
     * @param false|string|array $label The properties for a label.
     * @param string $input The input widget.
     * @param \Cake\View\Form\ContextInterface $context The form context.
     * @param bool $escape Whether or not to HTML escape the label.
     * @return string Generated label.
     */
    protected function _renderLabel($radio, $label, $input, $context, $escape)
    {
       if ($this->_inline) {
           $label = [
               'text' => $radio['text'],
               'class' => 'radio-inline'
           ];
       }
       return parent::_renderLabel($radio, $label, $input, $context, $escape);
    }
}
