<?php

namespace SP\Driver\Test;

use SP\DriverTest\CrawlerDriverTest;
use SP\Driver\GuzzleCrawler;

/**
 * @covers SP\Driver\CurlLoader::send
 * @covers SP\Driver\CurlLoader::getConvertedHeaders
 * @covers SP\Driver\CurlLoader::setBase
 * @covers SP\Driver\CurlLoader::getBase
 * @covers SP\Driver\CurlLoader::getCurrentUri
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
