<?php

namespace Test\Kohkimakimoto\Temporary;

use Kohkimakimoto\Temporary\TemporaryDir;

class TemporaryDirTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $dir = new TemporaryDir();

        $this->assertTrue(is_string($dir->path()));
        file_put_contents($dir->path()."/file", "aaaaaaa");

        //echo $dir->path()."\n";
        $this->assertTrue(file_exists($dir));
        $this->assertTrue(is_dir($dir));
        $dir->close();
        $this->assertFalse(file_exists($dir));
    }
}
