# Temporary

[![Build Status](https://travis-ci.org/kohkimakimoto/Temporary.svg)](https://travis-ci.org/kohkimakimoto/Temporary)
[![Latest Stable Version](https://poser.pugx.org/kohkimakimoto/temporary/v/stable)](https://packagist.org/packages/kohkimakimoto/temporary) [![Total Downloads](https://poser.pugx.org/kohkimakimoto/temporary/downloads)](https://packagist.org/packages/kohkimakimoto/temporary) [![Latest Unstable Version](https://poser.pugx.org/kohkimakimoto/temporary/v/unstable)](https://packagist.org/packages/kohkimakimoto/temporary) [![License](https://poser.pugx.org/kohkimakimoto/temporary/license)](https://packagist.org/packages/kohkimakimoto/temporary)

A PHP helper class to manipulate a temporary file and directory.

temporary file.

```php
use Kohkimakimoto\Temporary\TemporaryFile;

$tmpfile = new TemporaryFile();

echo $tmpfile->path();  // ex) /private/var/folders/bt/xwh9qmcj00dctz53_rxclgtr0000gn/T/phpqWK5fj
$tmpfile->write("temporary data...");

echo $data = $tmpfile->read(); // temporary data...

// You don't need to close it. The temporary file will be closed automatically when the object removes.
```

temporary directory.

```php
use Kohkimakimoto\Temporary\TemporaryDir;

$tmpdir = new TemporaryDir();
echo $tmpdir->path();   // ex) /private/var/folders/bt/xwh9qmcj00dctz53_rxclgtr0000gn/T/KFHg4L

// You don't need to close it. The temporary dir will be deleted automatically when the object removes.
```

## Requirements

* PHP5.3 or later


## Installation

Create `composer.json` for installing via composer..

```
{
    "require": {
        "kohkimakimoto/temporary": "1.0.*"
    }
}
```

Run composer install command.

```
composer install
```

## Author

Kohki Makimoto <kohki.makimoto@gmail.com>

## License

MIT license.
