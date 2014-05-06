<?php
/**
 * The fallback base 62 encoder if the gmp extension is not present.
 *
 * @author chris
 * @created 06/05/2014 11:06
 */

namespace Kurl\Maths\Encode\Driver;

/**
 * Class PurePhpEncoder
 *
 * @package Kurl\Maths\Encode\Driver
 */
class PurePhpEncoder implements EncoderInterface
{
    /**
     * The dictionary to use to encode/decode numbers or strings.
     *
     * @var array
     */
    protected $dictionary;

    /**
     * The number of unique digits, including zero, that a positional numeral system uses to represent numbers.
     * AKA the number of characters in the dictionary.
     *
     * @var int
     */
    protected $radix;

    /**
     * Creates a new bijective encoder/decoder.
     */
    public function __construct()
    {
        $this->dictionary = str_split('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $this->radix = count($this->dictionary);
    }

    /**
     * Base 62 encodes a number.
     *
     * @param number $number the source number
     *
     * @return string the encoded number
     */
    public function encode($number)
    {
        $number = (int)$number;

        $result = array();

        if (0 === $number)
        {
            $result[] = $this->dictionary[0];
        }

        while ($number > 0)
        {
            $result[] = $this->dictionary[($number % $this->radix)];
            $number = floor($number / $this->radix);
        }

        return implode('', array_reverse($result));
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
        $i = 0;

        foreach(str_split($string) as $char)
        {
            $i = $i * $this->radix + array_search($char, $this->dictionary);
        }

        return $i;
    }
}