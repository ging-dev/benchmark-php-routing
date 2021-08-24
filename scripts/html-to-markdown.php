<?php

declare(strict_types=1);

use Symfony\Component\DomCrawler\Crawler;

require __DIR__.'/../vendor/autoload.php';

$html = file_get_contents(__DIR__.'/../.phpbench/html/index.html');

$crawler = new Crawler($html);

$result = $crawler->filterXPath('//table')->first()->outerHtml();

file_put_contents(__DIR__.'/../result.md', $result);
