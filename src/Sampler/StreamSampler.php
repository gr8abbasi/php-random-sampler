<?php

namespace Stream\Sampler\Sampler;

/**
 * Stream Sampler
 */
class StreamSampler implements SamplerInterface
{
    /**
     * @var \Traversable
     */
    private $iterator;

    /**
     * Stream Sampler
     *
     * @param \Traversable $iterator
     */
    public function __construct(\Traversable $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * {@inheritdoc}
     */
    public function getSample($size)
    {
        $sample = $this->prepareSample($size);

        return implode("", $sample);
    }

    /**
     * Prepare the sample
     *
     * @param int $size
     *
     * @return array
     */
    private function prepareSample($size)
    {
        $sample = [];
        $counter = 0;

        foreach ($this->iterator as $value) {
            if ($counter < $size) {
                $sample[$counter] = $value;
            } else {
                $random_number = (int)mt_rand(0, $counter);
                if ($random_number < $size) {
                    $sample[$random_number] = $value;
                }
            }
            $counter++;
        }
        return $sample;
    }
}
