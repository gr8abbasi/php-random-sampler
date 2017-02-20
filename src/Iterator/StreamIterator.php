<?php

namespace Stream\Sampler\Iterator;

use Stream\Sampler\Exception\NotReadableException;

/**
 * Stream Iterator
 */
class StreamIterator implements \IteratorAggregate
{
    /**
     * @var string
     */
    private $file_path;

    /**
     * Stream Iterator
     *
     * @param string $file_path
     */
    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        $handle = fopen($this->file_path, 'r');

        if (!$handle) {
            throw new NotReadableException("Error unable to read file");
        }

        while ($line = fgetc($handle)) {
            yield $line;
        }

        fclose($handle);
    }
}
