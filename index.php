<?php
require('xmlreader-iterators.php'); // require XMLReaderIterator library

$xmlInputFile  = 'feed_sample.xml';
$xmlOutputFile = 'iterator.xml';

$reader = new XMLReader();
$reader->open($xmlInputFile);
$writer = new XMLWriter();
$writer->openUri($xmlOutputFile);

$iterator = new XMLWritingIteration($writer, $reader);

$writer->startDocument();

foreach ($iterator as $node) {
    $isElement = $node->nodeType === XMLReader::ELEMENT;


    if ($isElement && $node->name === 'offers') {
    }

    if ($isElement && $node->name === 'offer') {
        $writer->startElement($node->name);
        $writer->writeAttribute('is_active',  "true");
        if ($node->isEmptyElement) {
            $writer->endElement();
        }

    } else {
        $iterator->write();
    }
}

$writer->endDocument();