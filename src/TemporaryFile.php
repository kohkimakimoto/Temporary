<?php

namespace Kohkimakimoto\Temporary;

class TemporaryFile
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

        $this->path = tempnam($dir, $prefix);
        $this->handle = fopen($this->path, "w");

        $this->closed = false;
    }

    public function __destruct()
    {
        $this->close();
    }

    public function write($contents)
    {
        file_put_contents($this->path, $contents);
    }

    public function read()
    {
        return file_get_contents($this->path);
    }

    public function path()
    {
        return $this->path;
    }

    public function handle()
    {
        return $this->handle;
    }

    public function close()
    {
        if (!$this->closed) {
            fclose($this->handle);
            unlink($this->path);
            $this->closed = true;
        }
    }

    public function __toString()
    {
        return $this->path;
    }
}
