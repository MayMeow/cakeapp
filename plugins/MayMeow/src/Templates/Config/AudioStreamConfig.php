<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/21/2017
 * Time: 1:37 PM
 */

namespace MayMeow\Templates\Config;

use Cake\Utility\Text;

class AudioStreamConfig extends AbstractConfig
    implements McloudConfigInterface
{
    protected $stream = [];

    protected function configure()
    {
        $this
            ->setName('audio-stream');
    }

    /**
     * @param null $name
     * @param null $url
     * @return $this
     */
    public function setStream($name = null, $url = null)
    {
        $this->stream[] = [
            'id' => Text::uuid(),
            'name' => $name,
            'url' => $url
        ];
        return $this;
    }
}
