# Random Sampler (Reservoir Sampling)

Random Sampler or [Reservoir Sampling](https://en.wikipedia.org/wiki/Reservoir_sampling) (which is algorithm used to achieve desired results) is a Command Line (CLI) application which provides a convinient and memory efficient way of generating random samples when there is unkonw and huge size of data stream is going through. When you are not sure how long stream could be and keeping samples random as much as possible, here this Reservoir Sampling algorithm (from University Studies) come to rescue me. :)

I used PHP [Traversable](http://php.net/manual/en/class.traversable.php) ([IteratorAggregate](http://php.net/manual/en/class.iteratoraggregate.php) & [Iterators](http://php.net/manual/en/class.iterator.php)) to make application memory constant, predictable and stable. 

For time being I'm only considering following two ways of inputs are required i.e. Piped Input (CLI) and by generating Random String and then create samples from that Random String.

## Install

Use composer to insall the application and then from application root directory

You can run sampler from command line by running:

## Piped Input

You can pipe any output from CLI to the sampler e.g. Linux urandom to get data as below: 

```dd if=/dev/urandom count=100 bs=1MB | base64 | ./bin/stream_sampler.php -s 5```
-s is size of desired sample e.g. ABCDE for -s 5

## Random String

```./bin/stream_sampler.php -s 11 -r 1```
-r indicates thats you want to generate samples from random string
