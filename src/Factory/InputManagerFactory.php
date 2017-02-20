<?php

namespace Stream\Sampler\Factory;

use Stream\Sampler\Utils\InputManager;
use Symfony\Component\Console\Input\ArgvInput;

class InputManagerFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
   public function create()
   {
       return new InputManager(new ArgvInput());
   }
}
