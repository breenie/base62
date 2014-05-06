<?php
/**
 * - PurePhpEncoderTest.php
 *
 * @author  chris
 * @created 06/05/2014 11:17
 */

namespace Kurl\Test\Maths\Encode\Driver;

use Kurl\Maths\Encode\Driver\PurePhpEncoder;

/**
 * Class PurePhpEncoderTest
 *
 * @package Kurl\Test\Maths\Encode\Driver
 */
class PurePhpEncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests early boundary conditions of encode.
     */
    public function testEncode()
    {
        $encoder = new PurePhpEncoder();

        $this->assertEquals('0', $encoder->encode(0));
        $this->assertEquals('9', $encoder->encode(9));
        $this->assertEquals('A', $encoder->encode(10));
        $this->assertEquals('Z', $encoder->encode(35));
        $this->assertEquals('a', $encoder->encode(36));
        $this->assertEquals('z', $encoder->encode(61));
        $this->assertEquals('10', $encoder->encode(62));
    }

    /**
     * Tests early boundary conditions of decode.
     */
    public function testDecode()
    {
        $encoder = new PurePhpEncoder();

        $this->assertEquals(0, $encoder->decode('0'));
        $this->assertEquals(9, $encoder->decode('9'));
        $this->assertEquals(10, $encoder->decode('A'));
        $this->assertEquals(35, $encoder->decode('Z'));
        $this->assertEquals(36, $encoder->decode('a'));
        $this->assertEquals(61, $encoder->decode('z'));
        $this->assertEquals(62, $encoder->decode('10'));
    }
}
