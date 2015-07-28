<?php

namespace Test\Kohkimakimoto\TemporaryFile;

use Kohkimakimoto\TemporaryFile\TemporaryFile;

class TemporaryFileTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $file = new TemporaryFile();

        $this->assertTrue(is_string($file->path()));
        $file->write("This is a test text!");
        $this->assertEquals("This is a test text!", $file->read());

        // just get.
        $hd = $file->handle();

        $file->close();
    }

    public function testForReadme()
    {
        $tmpfile = new TemporaryFile();

        echo $tmpfile->path();  // ex) /private/var/folders/bt/xwh9qmcj00dctz53_rxclgtr0000gn/T/phpqWK5fj
        $tmpfile->write("temporary data...");

        echo $data = $tmpfile->read(); // temporary data...
    }
}
