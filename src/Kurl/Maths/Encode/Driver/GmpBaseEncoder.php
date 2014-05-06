<?php
/**
 * The gmp base encoder driver.
 *
 * @author  chris
 * @created 06/05/2014 11:05
 */

namespace Kurl\Maths\Encode\Driver;

/**
 * Class GmpBase
 *
 * @package Kurl\Maths\Encode\Driver
 */
class GmpBaseEncoder implements EncoderInterface
{
    /**
     * Base 62 encodes a number.
     *
     * @param number $number the source number
     *
     * @return string the encoded number
     */
    public function encode($number)
    {
        return gmp_strval(gmp_init((string)$number), 62);
    }

    /**
     * Base 62 decodes a string.
     *
     * @param string $string the encoded string
     *
     * @return number the decoded number
     */
    public function decode($string)
    {
        return gmp_intval(gmp_init($string, 62));
    }
}