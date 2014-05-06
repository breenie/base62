<?php
/**
 * The base 62 encoder test.
 *
 * @author  chris
 * @created 06/05/2014 10:51
 */

namespace Kurl\Test\Maths\Encode;

use Kurl\Maths\Encode\Base62;
use Kurl\Maths\Encode\Driver\GmpBaseEncoder;
use Kurl\Maths\Encode\Driver\PurePhpEncoder;

/**
 * Class Base62
 *
 * @package Kurl\Maths\Encode
 */
class Base62Test extends \PHPUnit_Framework_TestCase
{
    public function testDrivers()
    {
        $encoder = new Base62();

        $this->assertInstanceOf('Kurl\Maths\Encode\Driver\EncoderInterface', $encoder->getDriver());

        $encoder->setDriver(new GmpBaseEncoder());
        $this->assertInstanceOf('Kurl\Maths\Encode\Driver\GmpBaseEncoder', $encoder->getDriver());

        $encoder->setDriver(new PurePhpEncoder());
        $this->assertInstanceOf('Kurl\Maths\Encode\Driver\PurePhpEncoder', $encoder->getDriver());
    }

    /**
     * Tests early boundary conditions of encode.
     */
    public function testEncode()
    {
        $encoder = new Base62();

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
        $encoder = new Base62();

        $this->assertEquals(0, $encoder->decode('0'));
        $this->assertEquals(9, $encoder->decode('9'));
        $this->assertEquals(10, $encoder->decode('A'));
        $this->assertEquals(35, $encoder->decode('Z'));
        $this->assertEquals(36, $encoder->decode('a'));
        $this->assertEquals(61, $encoder->decode('z'));
        $this->assertEquals(62, $encoder->decode('10'));
    }
}