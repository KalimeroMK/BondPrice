<?php
namespace App\DTOs;

use Illuminate\Http\Request;

class BondPriceRequestDTO
{
    public string $country_code;
    public int $years;

    public function __construct(string $country_code, int $years)
    {
        $this->country_code = $country_code;
        $this->years = $years;
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('country_code'),
            $request->input('years')
        );
    }
}
