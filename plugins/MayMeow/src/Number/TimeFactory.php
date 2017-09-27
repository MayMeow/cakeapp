<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 8/14/2017
 * Time: 6:53 PM
 */

namespace MayMeow\Number;


class TimeFactory
{
    /**
     * @param $seconds
     */

    const SECONDS_IN_MINUTE = 60;

    const SECONDS_IN_HOUR = 60 * self::SECONDS_IN_MINUTE;

    const SECONDS_IN_DAY = 24 * self::SECONDS_IN_HOUR;

    const SECONDS_IN_WEEK = 7 * self::SECONDS_IN_DAY;

    protected $weeks;

    protected $days;

    protected $hours;

    protected $minutes;

    protected $seconds;

    /**
     * @return mixed
     */
    public function getWeeks()
    {
        return $this->weeks;
    }

    /**
     * @param mixed $weeks
     * @return TimeFactory
     */
    public function setWeeks($weeks)
    {
        $this->weeks = $weeks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     * @return TimeFactory
     */
    public function setDays($days)
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     * @return TimeFactory
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param mixed $minutes
     * @return TimeFactory
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeconds()
    {
        return $this->seconds;
    }

    /**
     * @param mixed $seconds
     * @return TimeFactory
     */
    public function setSeconds($seconds)
    {
        $this->seconds = $seconds;
        return $this;
    }

    public function secondsToTime($seconds)
    {
        $this->weeks = floor($seconds / static::SECONDS_IN_WEEK);

        $daySeconds = $seconds % static::SECONDS_IN_WEEK;
        $this->days = floor($daySeconds / static::SECONDS_IN_DAY);

        $hourSeconds = $daySeconds % static::SECONDS_IN_DAY;
        $this->hours = floor($hourSeconds / static::SECONDS_IN_HOUR);

        $minuteSeconds = $hourSeconds % static::SECONDS_IN_HOUR;
        $this->minutes = floor($minuteSeconds / static::SECONDS_IN_MINUTE);

        $remainingSeconds = $minuteSeconds % static::SECONDS_IN_MINUTE;
        $this->seconds = ceil($remainingSeconds);

        return $this;
    }

    public function toString()
    {
        $stringTime = $this->weeks . 'w';
        $stringTime .= ' ' . $this->days . 'd';
        $stringTime .= ' ' . $this->hours . 'h';
        $stringTime .= ' ' . $this->minutes . 'm';
        $stringTime .= ' ' . $this->seconds . 's';

        return $stringTime;
    }
}