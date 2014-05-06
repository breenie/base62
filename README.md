# A simple base 62 encoder/decoder

Does what it says on the tin. Converts base 10 numbers to base 62 encoded strings and back again. If the
[GMP extension](http://uk1.php.net/manual/en/book.gmp.php) is installed this will be used. If not the pure PHP
implementation will encode/decode the values. Without actually doing any kind of performance tests I can only assume the
GMP driver is better/faster/more precise.

While there are other great base 62 encoders in composer, none reflected the ```gmp_strval``` implementation preferring
to use a dictionary ```[0-9a-zA-z]``` whilst GMP uses ```[0-9A-Za-z]```.

## Installation

Add the following to your ```composer.json``` and update/install:

```json
{
    "require": {
        "kurl/base62": "1.0.*"
    }
}
```

## Encode

```php
<?php

use Kurl\Maths\Encode\Base62;

$encoder = new Base62();
echo $encoder->encode(35);

// Z
```

## Decode

```php
<?php

use Kurl\Maths\Encode\Base62;

$encoder = new Base62();
echo $encoder->encode('a');

// 36
```

## Using the pure PHP encoder

If for whatever reason you want to use the pure PHP driver by default:

```php
<?php

use Kurl\Maths\Encode\Driver\PurePhpEncoder;

$encoder = new Base62();
$encoder->setDriver(new PurePhpEncoder());
echo $encoder->encode('a');

// 36
```

## Why "Maths"?

I'm British and that is how we spell it.