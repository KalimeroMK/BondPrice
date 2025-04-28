<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBondPriceRequest;
use App\Actions\StoreBondPriceAction;
use App\DTOs\BondPriceRequestDTO;
use Illuminate\Http\JsonResponse;

class BondPriceController extends Controller
{
    public function store(StoreBondPriceRequest $request, StoreBondPriceAction $action): JsonResponse
    {
        $dto = BondPriceRequestDTO::fromRequest($request);
        $action->execute($dto);

        return response()->json([
            'message' => 'Processing started'
        ], 202);
    }
}
