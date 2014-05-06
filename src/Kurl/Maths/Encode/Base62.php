<?php
/**
 * The base 62 encoder factory.
 *
 * @author  chris
 * @created 06/05/2014 10:51
 */

namespace Kurl\Maths\Encode;

use Kurl\Maths\Encode\Driver\EncoderInterface;
use Kurl\Maths\Encode\Driver\GmpBaseEncoder;
use Kurl\Maths\Encode\Driver\PurePhpEncoder;

/**
 * Class Base62
 *
 * @package Kurl\Maths\Encode
 */
class Base62
{
    /**
     * The encoder/decoder driver.
     *
     * @var EncoderInterface
     */
    protected $driver;

    /**
     * Creates a new base 62 encoder.
     */
    public function __construct()
    {
        $this->setDriver(true === function_exists('gmp_base') ? new GmpBaseEncoder() : new PurePhpEncoder());
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
        return $this->getDriver()->encode($number);
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
        return $this->getDriver()->decode($string);
    }

    /**
     * Sets the encoder driver.
     *
     * @param \Kurl\Maths\Encode\Driver\EncoderInterface $driver
     *
     * @return Base62
     */
    public function setDriver(EncoderInterface $driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Gets the encoder driver
     *
     * @return \Kurl\Maths\Encode\Driver\EncoderInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }
}