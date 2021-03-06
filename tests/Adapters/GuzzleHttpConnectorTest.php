<?php

declare(strict_types=1);

/*
 * This file is part of Laravel DigitalOcean.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\DigitalOcean\Adapters;

use DigitalOceanV2\Adapter\GuzzleHttpAdapter;
use GrahamCampbell\DigitalOcean\Adapters\GuzzleHttpConnector;
use GrahamCampbell\TestBench\AbstractTestCase;
use InvalidArgumentException;

/**
 * This is the guzzlehttp connector test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class GuzzleHttpConnectorTest extends AbstractTestCase
{
    public function testConnectStandard()
    {
        $connector = $this->getGuzzleHttpConnector();

        $return = $connector->connect(['token' => 'your-token']);

        $this->assertInstanceOf(GuzzleHttpAdapter::class, $return);
    }

    public function testConnectWithoutTokent()
    {
        $connector = $this->getGuzzleHttpConnector();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The guzzlehttp connector requires configuration.');

        $connector->connect([]);
    }

    protected function getGuzzleHttpConnector()
    {
        return new GuzzleHttpConnector();
    }
}
