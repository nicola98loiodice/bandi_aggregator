<?php

namespace App\Scrapers\Sources;

use App\Scrapers\Contracts\SourceScraper;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CnrScraper implements SourceScraper
{
    public function fetch(): array
    {
        $client = new Client();

        $baseUrl = 'https://www.cnr.it';
        $url = $baseUrl . '/it/progetti-di-ricerca/progetti';

        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $results = [];

        $crawler->filter('a')->each(function (Crawler $node) use (&$results, $baseUrl) {

            $title = trim($node->text());
            $link = $node->attr('href');

            // filtro base
            if (!$title || !$link) {
                return;
            }

            // pulizia link inutili
            if (
                str_starts_with($link, '#') ||
                str_starts_with($link, 'javascript:')
            ) {
                return;
            }

            //  normalizza URL (non più404)
            if (!str_starts_with($link, 'http')) {
                $link = rtrim($baseUrl, '/') . '/' . ltrim($link, '/');
            }

            // filtro keyword (più robusto)
            $keywords = ['ricerca', 'assegno', 'bando', 'progetto'];

            $match = false;
            foreach ($keywords as $kw) {
                if (str_contains(strtolower($title), $kw)) {
                    $match = true;
                    break;
                }
            }

            if (!$match) {
                return;
            }

            //  deduplicazione base (evita spam immediato)
            $hash = md5($link);

            if (isset($results[$hash])) {
                return;
            }

            $results[$hash] = [
                'titolo' => $title,
                'link' => $link,
                'ente' => 'CNR',
                'data_pubblicazione' => now()->toDateString(),
            ];
        });

        return array_values($results);
    }
}