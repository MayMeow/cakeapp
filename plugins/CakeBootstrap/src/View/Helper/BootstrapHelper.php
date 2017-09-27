<?php
namespace CakeBootstrap\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Bootstrap helper
 */
class BootstrapHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'class' => 'progress'
    ];

    /**
     * @param int $maxValue Maximum value of progress bar
     * @param int $currnetValue Current pgoress bar value
     * @param array $options Another options for progress bar
     * @return string
     */
    public function progressBar($maxValue = null, $currnetValue = null, $options = null)
    {
        empty($options) ? $config = $this->config() : $config = $options;
        $percent = floor(($currnetValue / $maxValue) * 100);
        $bar = '<div class="' . $config['class'] . '">
                            <div class="progress-bar" role="progressbar" aria-valuenow="' . $percent . '" aria-valuemin="0"
                                 aria-valuemax="100" style="width: ' . $percent . '%;">
                                <span class="sr-only">' . $percent . '% Complete</span>
                            </div>
                        </div>';

        return $bar;
    }
}
