<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/20/2017
 * Time: 3:51 PM
 */

namespace MayMeow\Git\Command;


class TagCommand extends BaseCommand
{
    const TAG_COMMAND = 'tag';

    public function listTags()
    {
        $this
            ->setName(self::TAG_COMMAND);

        return $this->_getCli();
    }

    public function getList()
    {
        return $this->listTags();
    }
}