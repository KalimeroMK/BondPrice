<?php
namespace App\Repositories;

use App\Models\BondPrice;

class BondPriceRepository
{
    public function updateOrCreate(array $attributes, array $values): BondPrice
    {
        return BondPrice::updateOrCreate($attributes, $values);
    }
}
