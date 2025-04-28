<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use App\Models\BondPrice;
use App\Jobs\ScrapeAndStoreBondPriceJob;

class BondPriceApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_bond_price_post_validation(): void
    {
        $response = $this->postJson('/api/bond-price', [
            'country_code' => 'B',
            'years' => 0
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['country_code', 'years']);
    }

    public function test_bond_price_factory_and_update(): void
    {
        $bond = BondPrice::factory()->create([
            'country_code' => 'BE',
            'years' => 1,
            'price' => '0.50',
        ]);

        $this->assertDatabaseHas('bond_prices', [
            'country_code' => 'BE',
            'years' => 1,
            'price' => '0.50',
        ]);
    }


    public function test_bond_price_api_dispatches_job()
    {
        Queue::fake();
        $data = [
            'country_code' => 'US',
            'years' => 10
        ];
        $this->postJson('/api/bond-price', $data);

        Queue::assertPushed(ScrapeAndStoreBondPriceJob::class);
    }
}
