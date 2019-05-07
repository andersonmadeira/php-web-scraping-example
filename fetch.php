<?php

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

require __DIR__ . '/vendor/autoload.php';

const WEEK_MOVIE_LIST_SELECTOR = '#Opening td.middle_col';
const ROTTEN_TOMATOES_LINK = 'https://www.rottentomatoes.com/';

$client = new Client();
$guzzleClient = new GuzzleClient([
    'timeout' => 60
]);

$client->setClient($guzzleClient);

$crawler = $client->request('GET', ROTTEN_TOMATOES_LINK);

print "Opening this week:\n\n";

$crawler->filter(WEEK_MOVIE_LIST_SELECTOR)->each(function (Crawler $node) {
     print trim($node->text()) . "\n";
});
