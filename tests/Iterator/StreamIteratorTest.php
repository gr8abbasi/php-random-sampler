<?php

namespace tests\Iterator;

use org\bovigo\vfs\vfsStream;
use PHPUnit_Framework_TestCase;
use Stream\Sampler\Iterator\StreamIterator;

/**
 * StreamIterator Test
 */
class StreamIteratorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var VfsStream
     */
    public $root;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->root = vfsStream::setup("myrootdir");
    }

    /**
     * @test
     */
    public function iteratorReturnCorrectStream()
    {
        $string = "thisisarandomstring";
        $file = vfsStream::newFile('test')
                        ->withContent($string)
                        ->at($this->root);

        $iterator = new StreamIterator($file->url());

        $result = $this->getResults($iterator);

        $this->assertEquals(str_split($string), $result);
        $this->assertEquals(strlen($string), count($result));
    }

    /**
     * @test
     * @expectedException Stream\Sampler\Exception\NotReadableException
     * @expectedExceptionMessage Error unable to read file
     */
    public function throwsNotReadableException()
    {
        $file = vfsStream::newFile('fail-test', 0000)
                 ->withContent('failedcontents')
                 ->at($this->root);

        $iterator = new StreamIterator($file->url());

        $result = $this->getResults($iterator);
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_Error
     */
    public function errorThrownOnInvalidFile()
    {
        $iterator = new StreamIterator('invalid-file');

        $result = $this->getResults($iterator);
    }

    /**
     * Get Results
     *
     * @param StreamIterator $iterator
     *
     * @return array
     */
    private function getResults($iterator)
    {
        $result = [];
        foreach ($iterator as $item) {
            $result[] = $item;
        }

        return $result;
    }
}
