<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondPrice extends Model
{
    use HasFactory;
    protected $table = 'bond_prices';
    protected $fillable = [
        'country_code',
        'years',
        'price',
    ];
}
