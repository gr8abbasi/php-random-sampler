# Sampler

I assume following two ways of inputs are required i.e. Piped and Random String

Use composer to insall the application and then from application root directory

You can run sampler from command line by running:

## Piped Input

```dd if=/dev/urandom count=100 bs=1MB | base64 | ./bin/stream_sampler.php -s 5```

## Random String

```./bin/stream_sampler.php -s 11 -r 1```

## Note

Application have very basic unit tests covered, and I tried to keep application flexible for future extension.