<?php

namespace SP\GuzzleDriver;

use SP\Crawler\LoaderInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use GuzzleHttp\Client;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2015, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Loader implements LoaderInterface
{
    const USER_AGENT = 'Spiderling Simple Driver';

    /**
     * @var \Psr\Http\Message\UriInterface;
     */
    private $currentUri;

    /**
     * @var Client
     */
    private $client;

    public function getClient()
    {
        if (empty($this->client)) {
            $this->client = new Client();
        }

        return $this->client;
    }

    public function updateBaseUri(UriInterface $uri)
    {
        $base = (string) $uri->withPath('')->withQuery('')->withFragment('');
        $oldBase = (string) $this->getClient()->getConfig('base_uri');

        if ($base and $base !== $oldBase) {
            $this->client = new Client(['base_uri' => $base]);
        }
    }

    /**
     * @param  ServerRequestInterface $request
     */
    public function send(ServerRequestInterface $request)
    {
        $this->currentUri = $request->getUri();
        $this->updateBaseUri($this->currentUri);

        if (empty($this->currentUri->getHost())) {
            $this->currentUri = new Uri($this->getClient()->getConfig('base_uri').$this->currentUri);
        }

        return $this->getClient()->send($request);
    }

    /**
     * @return \Psr\Http\Message\UriInterface
     */
    public function getCurrentUri()
    {
        return $this->currentUri;
    }
}
