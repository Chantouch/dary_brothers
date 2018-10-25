<?php


namespace App\Generator;


use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfile;

class CustomCrawlProfile extends CrawlProfile
{

    /**
     * Determine if the given url should be crawled.
     *
     * @param \Psr\Http\Message\UriInterface $url
     *
     * @return bool
     */
    public function shouldCrawl(UriInterface $url): bool
    {
        if ($url->getHost() !== 'localhost' || $url->getHost() !== '127.0.0.1') {
            return false;
        }

        return $url->getPath() === '/';
    }
}
