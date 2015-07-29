# Temporary

[![Build Status](https://travis-ci.org/kohkimakimoto/Temporary.svg)](https://travis-ci.org/kohkimakimoto/Temporary)

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
        "kohkimakimoto/temporary": "0.1.*"
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
