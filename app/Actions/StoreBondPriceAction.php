<?php
namespace App\Actions;

use App\DTOs\BondPriceRequestDTO;
use App\Jobs\ScrapeAndStoreBondPriceJob;

class StoreBondPriceAction
{
    public function execute(BondPriceRequestDTO $dto): array
    {
        // Dispatch job to queue
        ScrapeAndStoreBondPriceJob::dispatch($dto->country_code, $dto->years);
        return ['message' => 'Scraping job dispatched'];
    }
}
