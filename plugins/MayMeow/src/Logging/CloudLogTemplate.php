<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2/26/2017
 * Time: 5:33 PM
 */

namespace MayMeow\Logging;

class CloudLogTemplate
{
    /**
     * Severity possible options
     * critical, error, warning, info, debug
     */
    public $severity = 'info';

    /**
     * @var $jsonPayload
     *
     * Response data from funcion
     */
    public $jsonPayload;

    /**
     * @var $resource
     *
     * Resource information
     */
    private $resource;

    /**
     * @var array $labels
     *
     * Labels
     */
    protected $labels = [];

    /**
     * @var $eventType
     *
     * Key to recognize event type.
     */
    protected $eventType;

    /**
     * @var
     */
    protected $author = 'system';

    /**
     * @param mixed $author
     * @return CloudLogTemplate
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return ResourceTemplate
     */
    private function _getResourceTempate()
    {
        if (!$this->resource) {
            $this->resource = new ResourceTemplate();
        }

        return $this->resource;
    }

    /**
     * @return ResourceTemplate
     */
    public function setResource()
    {
        return $this->_getResourceTempate();
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     *
     */
    protected function _setLabels()
    {
        $this->labels = [
            'MayMeow.Cloud.Package' => $this->resource->plugin,
            'MayMeow.Cloud.Domain' => $this->resource->controller,
            'MayMeow.Cloud.Action' => $this->resource->action,
            'MayMeow.Cloud.Resource' => $this->resource->id,
        ];
    }

    /**
     * @param $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return string
     *
     * Return JSON string of all variables in object
     */
    public function serialize()
    {
        $this->_setLabels();
        return json_encode(get_object_vars($this));
    }

}
