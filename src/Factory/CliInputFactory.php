<?php

namespace Stream\Sampler\Factory;

use Stream\Sampler\Utils\CliInput;
use Symfony\Component\Console\Input\ArgvInput;

class CliInputFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
   public function create()
   {
       return new CliInput(new ArgvInput());
   }
}
