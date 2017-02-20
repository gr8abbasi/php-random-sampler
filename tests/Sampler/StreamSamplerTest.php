<?php

namespace tests\Sampler;

use PHPUnit_Framework_TestCase;
use Stream\Sampler\Sampler\StreamSampler;

/**
 * StreamSampler Test
 */
class StreamSamplerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var StreamSampler
     */
    public $streamSampler;

    /**
     * @var Trasveresable
     */
    public $iterator;

    /**
     * @var array
     */
    public $services;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->iterator = $this->getMockBuilder('Stream\Sampler\Iterator\StreamIterator')
            ->setConstructorArgs(['some-file'])
            ->getMock();


        $this->streamSampler = new StreamSampler($this->iterator);
    }

    /**
     * @test
     */
    public function isInstanceOfSamplerInterface()
    {
        $this->assertInstanceOf(
            'Stream\Sampler\Sampler\SamplerInterface',
            $this->streamSampler
        );
    }

    /**
     * @test
     * @dataProvider providerCanReturnStringSamples
     */
    public function canReturnStringSamples($size, $input, $expected)
    {
        $this->iterator->method('getIterator')
            ->willReturn(new \ArrayIterator($input));

        $sample = $this->streamSampler->getSample($size);

        $this->assertEquals(strlen($sample), $expected);
    }

    public function providerCanReturnStringSamples()
    {
        return [
            yield [8, ['A','B', 'C','D', 'E', 'F', 'G', 'H'], 8],
            yield [7, ['A','B', 'C','D', 'E', 'F', 'G', 'H'], 7],
            yield [5, ['A','B', 'C','D', 'E', 'F', 'G', 'H'], 5],
            yield [2, ['A','B', 'C','D', 'E', 'F', 'G', 'H'], 2]
        ];
    }
}
