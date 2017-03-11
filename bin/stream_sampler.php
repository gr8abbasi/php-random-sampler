#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Stream\Sampler\Factory\CliInputFactory;
use Stream\Sampler\Factory\StreamSamplerFactory;
use Stream\Sampler\Factory\IteratorFactory;

$input  = (new CliInputFactory())->create();
$data = $input->getInputData();

$iterator = (new IteratorFactory($data))->create();

$sampler = (new StreamSamplerFactory($iterator))->create();

echo $sampler->getSample($data['size']);