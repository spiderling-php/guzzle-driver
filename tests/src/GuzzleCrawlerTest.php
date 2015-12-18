<?php

namespace SP\Driver\Test;

use SP\Driver\GuzzleCrawler;
use PHPUnit_Framework_TestCase;
use DOMDocument;

/**
 * @coversDefaultClass SP\Driver\GuzzleCrawler
 */
class GuzzleCrawlerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $document = new DOMDocument();

        $crawler = new GuzzleCrawler($document);

        $this->assertInstanceOf('SP\Driver\GuzzleLoader', $crawler->getLoader());
        $this->assertSame($document, $crawler->getDocument());

        $crawler = new GuzzleCrawler();

        $this->assertInstanceOf('SP\Driver\GuzzleLoader', $crawler->getLoader());
        $this->assertInstanceOf('DOMDocument', $crawler->getDocument());
    }
}
