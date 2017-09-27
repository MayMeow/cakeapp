<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/2/2017
 * Time: 10:50 PM
 */

namespace MayMeow\Helpers;

class TwoStepAuth implements TwoStepAuthInterface
{
    protected $_codeLength = 6;

    protected $secretKey;

    /**
     * @param int $secretLength
     * @return string
     * @throws \Exception
     */
    public function createSecret($secretLength = 16)
    {
        $validCharacters = $this->_getBase32LookupTable();

        // valid secret lengths are between 80 and 640 bits
        if($secretLength < 16 || $secretLength > 128) {
            throw new \Exception('Bad Seecret Length');
        }

        $secret = '';
        $rnd = false;

        if(function_exists('random_bytes')) {
            $rnd = random_bytes($secretLength);
        } elseif (function_exists('mcrypt_create_iv')) {
            $rnd = mcrypt_create_iv($secretLength, MCRYPT_DEV_URANDOM);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $rnd = openssl_random_pseudo_bytes($secretLength, $cryptoStrong);
            if($cryptoStrong) {
                $rnd = false;
            }
        }

        if ($rnd !== false) {
            for ($i = 0; $i < $secretLength; ++$i) {
                $secret .=$validCharacters[ord($rnd[$i]) & 31];
            }
        } else {
            throw new \Exception('No source of random');
        }

        //$secret;
        $this->secretKey = $secret;

        return $this;
    }

    public function key()
    {
        return $this->secretKey;
    }

    public function readableKey($secretKey = null)
    {
        $secretKey === null ? $secretKey = $this->secretKey : null;

        $readableKey = substr($secretKey, 0, 4) . '-' .
            substr($secretKey, 4, 4) . '-' .
            substr($secretKey, 8, 4) . '-' .
            substr($secretKey, 12, 4);

        return $readableKey;
    }

    public function getCode($secret, $timeSlice = null)
    {
        if ($timeSlice === null) {
            $timeSlice = floor(time() / 30);
        }

        $secretKey = $this->_base32Decode($secret);

        // Pack time into binary string
        $time = chr(0).chr(0).chr(0).chr(0).pack('N*', $timeSlice);
        // Hash it with users secret key
        $hm = hash_hmac('SHA1', $time, $secretKey, true);
        // Use last nipple of result as index/offset
        $offset = ord(substr($hm, -1)) & 0x0F;
        // grab 4 bytes of the result
        $hashPart = substr($hm, $offset, 4);
        // Unpack binary value
        $value = unpack('N', $hashPart);
        $value = $value[1];
        // Only 32 bits
        $value = $value & 0x7FFFFFFF;
        $modulo = pow(10, $this->_codeLength);

        return str_pad($value % $modulo, $this->_codeLength, '0', STR_PAD_LEFT);
    }

    public function getQRCodeGoogleUrl($name, $secret, $title = null, $params = [])
    {
        // TODO: Implement getQRCodeGoogleUrl() method.
    }

    public function verifyCode($secret, $code, $discrepancy = 1, $currentTimeSlice = null)
    {
        if ($currentTimeSlice === null) {
            $currentTimeSlice = floor(time() / 30);
        }

        if (strlen($code) != 6) {
            return false;
        }

        for ($i = -$discrepancy; $i <= $discrepancy; ++$i) {
            $calculatedCode = $this->getCode($secret, $currentTimeSlice + $i);
            if ($this->timingSafeEquals($calculatedCode, $code)) {
                return true;
            }
        }
        return false;
    }

    public function setCodeLength($length)
    {
        $this->_codeLength = $length;

        return $this;
    }

    /**
     * @param $secret
     * @return bool|string
     */
    protected function _base32Decode($secret)
    {
        if (empty($secret)) return '';

        $base32Characters = $this->_getBase32LookupTable();
        $base32Flipped = array_flip($base32Characters);

        $paddingCharacterCount = substr_count($secret, $base32Characters[32]);
        $allowedValues = [6, 4, 3, 1, 0];

        if (!in_array($paddingCharacterCount, $allowedValues)) {
            return false;
        }

        for ($i = 0; $i < 4; ++$i) {
            if($paddingCharacterCount == $allowedValues[$i] &&
                substr($secret, -($allowedValues[$i])) != str_repeat($base32Characters[32], $allowedValues[$i])) {
                return false;
            }
        }

        $secret = str_replace('=', '', $secret);
        $secret = str_split($secret);
        $binarString = '';

        for ($i = 0; $i < count($secret); $i = $i +8) {
            $x = '';
            if(!in_array($secret[$i], $base32Characters)) {
                return false;
            }
            for ($j = 0; $j < 8; ++$j) {
                $x .= str_pad(base_convert(@$base32Flipped[@$secret[$i + $j]], 10, 2), 5, '0', STR_PAD_LEFT);
            }
            $eightBits = str_split($x, 8);
            for ($z = 0; $z < count($eightBits); ++$z) {
                $binarString .= (($y = chr(base_convert($eightBits[$z], 2, 10))) || ord($y) == 48) ? $y : '';
            }
        }

        return $binarString;
    }

    /**
     * Get array with all 32 characters for decoding from/encoding to base32.
     *
     * @return array
     */
    protected function _getBase32LookupTable()
    {
        return [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', //  7
            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', // 15
            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', // 23
            'Y', 'Z', '2', '3', '4', '5', '6', '7', // 31
            '=',  // padding char
        ];
    }

    function timingSafeEquals($safeString, $userString)
    {
        if (function_exists('hash_equals')) {
            return hash_equals($safeString, $userString);
        }

        $safeLength = strlen($safeString);
        $userLength = strlen($userString);

        if ($userLength != $safeLength) {
            return false;
        }

        $result = 0;

        for ($i = 0; $i < $userLength; ++$i) {
            $result |= (ord($safeString[$i]) ^ ord($userString[$i]));
        }

        return $result === 0;
    }
}
