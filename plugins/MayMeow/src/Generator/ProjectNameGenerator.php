<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2/9/2017
 * Time: 11:20 AM
 */

namespace MayMeow\Generator;

use MayMeow\Generator\Model\Adjective;
use MayMeow\Generator\Model\Noun;

class ProjectNameGenerator
{
    protected $nouns;

    protected $adjectives;

    public $number = false;

    protected $projectName;

    /**
     * ProjectNameGenerator constructor.
     */
    public function __construct()
    {
        $this->nouns = new Noun();
        $this->adjectives = new Adjective();
    }

    /**
     * Function generate
     * Return generated name as array
     * @return mixed
     */
    public function generate()
    {
        $this->_generate();

        return $this->projectName;
    }

    /**
     * function dashed
     * Returns dashed string
     * @return string
     */
    public function dashed()
    {
        $this->_generate();

        $name = $this->projectName['adjective'] . '-' . $this->projectName['noun'];
        isset($this->projectName['number']) ? $name .= '-' . $this->projectName['number'] : null;

        return $name;
    }

    /**
     * Function _generate()
     * generate projectName from words
     */
    protected function _generate()
    {
        $nounCount = $this->nouns->getCount();
        $adjectiveCount = $this->adjectives->getCount();

        $this->projectName = [
            'adjective' => $this->adjectives->words[rand(0, $adjectiveCount-1)],
            'noun' => $this->nouns->words[rand(0,$nounCount-1)]
        ];

        if ($this->number) {
            $this->projectName['number'] = rand(1000, 5000);
        }
    }
}
