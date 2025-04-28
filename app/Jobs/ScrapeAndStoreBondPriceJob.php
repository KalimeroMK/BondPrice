<?php
namespace App\Jobs;

use App\Actions\ScrapeAndStoreBondPriceAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScrapeAndStoreBondPriceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $countryCode;
    protected int $years;

    public function __construct(string $countryCode, int $years)
    {
        $this->countryCode = $countryCode;
        $this->years = $years;
    }

    public function handle(ScrapeAndStoreBondPriceAction $action): void
    {
        $action->execute($this->countryCode, $this->years);
    }
}
