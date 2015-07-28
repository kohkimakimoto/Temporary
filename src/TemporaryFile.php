<?php

namespace Kohkimakimoto\TemporaryFile;

class TemporaryFile
{
    /**
     * @var resource
     */
    protected $tempfile;

    /**
     * @var string
     */
    protected $path;

    protected $closed;

    public function __construct()
    {
        $this->tempfile = tmpfile();
        $metaData = stream_get_meta_data($this->tempfile);
        $this->path = $metaData['uri'];

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
        return $this->tempfile;
    }

    public function close()
    {
        if (!$this->closed) {
            fclose($this->tempfile);
            $this->closed = true;
        }
    }
}
