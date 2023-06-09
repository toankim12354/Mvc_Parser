<?php

use Wrapper\Models\DantriParser;
use Wrapper\Models\VietnamnetParser;
use Wrapper\Models\VnexpressParser;

class ParserFactory
{
    /**
     * @throws Exception
     */
    public static function make(string $url): DantriParser|VietnamnetParser|VnexpressParser
    {
        /** @var ParserFactory $parser */
        return match (true) {
            str_contains($url, "dantri.com.vn") => new DantriParser(
                $url,
                'title-page detail',
                'singular-content p',
                'date'
            ),
            str_contains($url, "vietnamnet.vn") => new VietnamnetParser(
                $url,
                'content-detail-title',
                'maincontent',
                'bread-crumb-detail__time'
            ),
            str_contains($url, "vnexpress.net") => new VnexpressParser(
                $url,
                'title-detail',
                'fck_detail',
                'date'
            ),
            default => throw new Exception('Invalid parser type'),
        };
    }
}