<?php

namespace Kohkimakimoto\Temporary;

class TemporaryDir
{
    /**
     * @var resource
     */
    protected $handle;

    /**
     * @var string
     */
    protected $path;

    protected $closed;

    public function __construct($dir = null, $prefix = "")
    {
        if ($dir === null) {
            $dir = sys_get_temp_dir();
        }

        $tempname = tempnam($dir, $prefix);
        if (file_exists($tempname)) {
             unlink($tempname);
        }
        mkdir($tempname);
        if (!is_dir($tempname)) {
            throw new \RuntimeException("Couldn't create tmp directory ".$tempname);
        }

        $this->path = $tempname;
        $this->closed = false;
    }

    public function __destruct()
    {
        $this->close();
    }

    public function path()
    {
        return $this->path;
    }

    public function close()
    {
        if (!$this->closed) {
            $this->remove($this->path);
            $this->closed = true;
        }
    }

    public function __toString()
    {
        return $this->path;
    }

    protected function remove($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir.DIRECTORY_SEPARATOR.$object) == "dir") {
                        $this->remove($dir.DIRECTORY_SEPARATOR.$object);
                    } else {
                        unlink($dir.DIRECTORY_SEPARATOR.$object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
}
