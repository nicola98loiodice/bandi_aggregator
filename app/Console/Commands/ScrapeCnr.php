<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scrapers\Sources\CnrScraper;
use App\Services\BandoService;

class ScrapeCnr extends Command
{
    protected $signature = 'scrape:cnr';
    protected $description = 'Scrape CNR bandi';

    public function handle()
    {
        $scraper = new CnrScraper();
        $service = new BandoService();

        $results = $scraper->fetch();

        foreach ($results as $bando) {
            $service->store($bando);
        }

        $this->info('Scraping completato: ' . count($results) . ' bandi trovati.');
    }
}