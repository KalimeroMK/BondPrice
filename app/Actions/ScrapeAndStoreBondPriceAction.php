<?php
namespace App\Actions;

use App\Repositories\BondPriceRepository;
use Illuminate\Support\Facades\Http;

class ScrapeAndStoreBondPriceAction
{
    protected BondPriceRepository $repo;

    public function __construct(BondPriceRepository $repo)
    {
        $this->repo = $repo;
    }

    public function execute(string $countryCode, int $years): void
    {
        $urls = [
            'BE' => 'http://www.worldgovernmentbonds.com/bond-historical-data/belgium/1-year/',
            'FR' => 'http://www.worldgovernmentbonds.com/bond-historical-data/france/1-year/',
            'GE' => 'http://www.worldgovernmentbonds.com/bond-historical-data/germany/1-year/',
            'IT' => 'http://www.worldgovernmentbonds.com/bond-historical-data/italy/1-year/',
            'ES' => 'http://www.worldgovernmentbonds.com/bond-historical-data/spain/1-year/',
        ];
        $url = $urls[$countryCode] ?? null;
        if (!$url) return;

        $response = Http::get($url);
        if ($response->failed()) return;

        // Parse bond price from $response->body()
        preg_match('/<td class="text-right">([\d\.,]+)<\/td>/', $response->body(), $matches);
        $bondPrice = $matches[1] ?? null;

        if ($bondPrice) {
            $this->repo->updateOrCreate(
                ['country_code' => $countryCode, 'years' => $years],
                ['price' => $bondPrice]
            );
        }
    }
}
