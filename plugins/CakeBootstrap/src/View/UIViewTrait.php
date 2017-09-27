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
 * @created 31.5.16 9:00
 */

namespace CakeBootstrap\View;

/**
 * UIViewTrait: Trait that loads the custom UIBootstrap helpers and sets View
 * layout to the UIBootstrap's one.
 */
trait UIViewTrait
{
    /**
     * Initialization hook method.
     *
     * @param array $options Associative array with valid keys:
     *   - `layout`:
     *      - If not set or true will use the plugin's layout
     *      - If a layout name passed it will be used
     *      - If false do nothing (will keep your layout)
     *
     * @return void
     */
    public function initializeUI(array $options = [])
    {
        if ((!isset($options['layout']) || $options['layout'] === true) &&
            $this->layout === 'default'
        ) {
            $this->layout = 'CakeBootstrap.default';
        } elseif (isset($options['layout']) && is_string($options['layout'])) {
            $this->layout = $options['layout'];
        }
        $this->loadHelper('Html', ['className' => 'CakeBootstrap.Html']);
        $this->loadHelper('Form', ['className' => 'CakeBootstrap.Form']);
        $this->loadHelper('Flash', ['className' => 'CakeBootstrap.Flash']);
        $this->loadHelper('Paginator', ['className' => 'CakeBootstrap.Paginator']);
    }
}
