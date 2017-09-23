<?php
namespace App\Controller;

use App\Controller\AppController;
use Emojione\Client;
use Emojione\Ruleset;
use MayMeow\Helpers\MeowDown;

/**
 * Marked Controller
 *
 */
class MarkedController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function mark()
    {
        $md = new MeowDown();
        $emoji = new Client(new Ruleset());

        $markdown = $emoji->shortnameToUnicode($md->parse($this->request->getData('test')));

        $this->set('markdown', $markdown);
        $this->set('_serialize', 'markdown');
    }
}
