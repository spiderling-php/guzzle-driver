<?php

namespace SP\Driver\Test;

use SP\DriverTest\CrawlerDriverTest;
use SP\Driver\GuzzleCrawler;

/**
 * @covers SP\Driver\GuzzleLoader::send
 * @covers SP\Driver\GuzzleLoader::getClient
 * @covers SP\Driver\GuzzleLoader::updateBaseUri
 * @covers SP\Driver\GuzzleLoader::getCurrentUri
 */
class IntegrationTest extends CrawlerDriverTest
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        usleep(50000);

        self::setDriver(new GuzzleCrawler());
    }
}
