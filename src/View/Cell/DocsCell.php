<?php
namespace App\View\Cell;

use Cake\View\Cell;
use MayMeow\Helpers\Parsedown;

/**
 * Docs cell
 */
class DocsCell extends Cell
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
    public function display($path)
    {
        $doc = file_get_contents(DOCS . $path . '.md');

        $md = new Parsedown();
        $parsed = $md->text($doc);

        $this->set('text', $parsed);
    }

    public function text($path)
    {
        $doc = file_get_contents(DOCS . $path);

        $md = new Parsedown();
        $parsed = $md->text($doc);

        $this->set('text', $parsed);
    }
}
