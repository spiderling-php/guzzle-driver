<?php

namespace SP\Driver\Test;

use PHPUnit_Framework_TestCase;
use SP\Driver\GuzzleSession;

/**
 * @coversDefaultClass SP\Driver\GuzzleSession
 */
class GuzzleSessionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $browser = $this
            ->getMockBuilder('SP\Driver\GuzzleCrawler')
            ->disableOriginalConstructor()
            ->getMock();

        $session = new GuzzleSession($browser);

        $this->assertInstanceOf('SP\Spiderling\CrawlerInterface', $session->getCrawler());

        $this->assertSame($browser, $session->getCrawler());
    }

    /**
     * @covers ::__construct
     */
    public function testConstructDefault()
    {
        $session = new GuzzleSession();

        $this->assertInstanceOf('SP\Driver\GuzzleCrawler', $session->getCrawler());
    }
}
