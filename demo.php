<?php

include __DIR__ . '/vendor/autoload.php';

$streamFactory = new \Http\Message\StreamFactory\GuzzleStreamFactory();
$stream = $streamFactory->createStream('Hello world');
$gzipStream = new \Http\Message\Encoding\GzipDecodeStream($stream);

echo $gzipStream->getContents() . PHP_EOL;

if ( $gzipStream->isSeekable() ) {
    $gzipStream->rewind();
    echo $gzipStream->getContents();
}
