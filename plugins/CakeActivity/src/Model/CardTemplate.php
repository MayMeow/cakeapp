<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/20/2017
 * Time: 9:24 PM
 */

namespace CakeActivity\Model;

use CakeApp\Component\IO\BaseObject;

/**
 * Class CardTemplate
 * @package CakeActivity\Model
 */
class CardTemplate extends BaseObject
{
    /**
     * @var
     */
    protected $type;

    /**
     * @var
     */
    protected $themeColor;

    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $text;

    /**
     * @var
     */
    protected $timestamp;

    /**
     * @var
     */
    protected $relatedItem;

    /**
     * @var
     */
    protected $user;

    /**
     * @return UserTemplate
     */
    public function setUser()
    {
        if (is_null($this->user)) {
            $this->user = new UserTemplate();
        }

        return $this->user;
    }

    /**
     * @return LinkTemplate
     */
    public function setRelatedItem()
    {
        if (is_null($this->relatedItem)) {
            $this->relatedItem = new LinkTemplate();
        }

        return $this->relatedItem;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return CardTemplate
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThemeColor()
    {
        return $this->themeColor;
    }

    /**
     * @param mixed $themeColor
     * @return CardTemplate
     */
    public function setThemeColor($themeColor)
    {
        $this->themeColor = $themeColor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return CardTemplate
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return CardTemplate
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return CardTemplate
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }


}