<?php
/**
 * - EncoderInterface.php
 *
 * @author chris
 * @created 06/05/2014 11:06
 */

namespace Kurl\Maths\Encode\Driver;


interface EncoderInterface {

    /**
     * Base 62 encodes a number.
     *
     * @param number $number the source number
     *
     * @return string the encoded number
     */
    public function encode($number);

    /**
     * Base 62 decodes a string.
     *
     * @param string $string the encoded string
     *
     * @return number the decoded number
     */
    public function decode($string);
}