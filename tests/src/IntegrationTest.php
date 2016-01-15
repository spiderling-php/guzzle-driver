<?php

namespace SP\GuzzleDriver\Test;

use SP\DriverTest\CrawlerDriverTest;
use SP\GuzzleDriver\Crawler;

/**
 * @covers SP\GuzzleDriver\Loader
 */
class IntegrationTest extends CrawlerDriverTest
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        usleep(50000);

        self::setDriver(new Crawler());
    }
}
