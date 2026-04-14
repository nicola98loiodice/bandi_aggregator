<?php
namespace App\Scrapers\Contracts;
interface SourceScraper {
    public function fetch(): array;
}