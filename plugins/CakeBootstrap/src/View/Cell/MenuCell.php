<?php
namespace CakeBootstrap\View\Cell;

use Cake\Core\Configure;
use Cake\View\Cell;

/**
 * Menu cell
 */
class MenuCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }

    public function admin()
    {
        $menu = Configure::read('CakeBootstrap.Menu');
        $this->set('menu', $menu);
    }
}
