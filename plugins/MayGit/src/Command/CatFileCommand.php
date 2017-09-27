<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 9:05 PM
 */

namespace MayMeow\Git\Command;

class CatFileCommand extends BaseCommand
{
    const GIT_CAT_FILE = 'cat-file';

    public function contentBySha($sha)
    {
        $this->setName(static::GIT_CAT_FILE)
            ->addArgument('-p')
            ->setSubject($sha);

        return $this->_getCli();
    }
}