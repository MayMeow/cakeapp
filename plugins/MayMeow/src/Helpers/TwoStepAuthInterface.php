<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/2/2017
 * Time: 10:52 PM
 */

namespace MayMeow\Helpers;


interface TwoStepAuthInterface
{
    /**
     * @param $secretLength
     * @return mixed
     */
    public function createSecret($secretLength);

    /**
     * @param $secret
     * @param $timeSlice
     * @return mixed
     */
    public function getCode($secret, $timeSlice);

    /**
     * @param $name
     * @param $secret
     * @param null $title
     * @param array $params
     * @return mixed
     */
    public function getQRCodeGoogleUrl($name, $secret, $title = null, $params = []);

    /**
     * @param $secret
     * @param $code
     * @param $discrepancy
     * @param null $currentTimeSlice
     * @return mixed
     */
    public function verifyCode($secret, $code, $discrepancy, $currentTimeSlice = null);

    /**
     * @param $length
     * @return mixed
     */
    public function setCodeLength($length);
}
