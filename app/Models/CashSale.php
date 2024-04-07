<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashSale extends Model
{
    use HasFactory;
    protected $guarded = [];
//    public function bodyPriceUzs(): Attribute
//    {
//        return Attribute::make(
//          get: fn (float $value) => number_format($value, 0, '.', ' '),
//        );
//    }
//    public function bodyPriceUsd(): Attribute
//    {
//        return Attribute::make(
//            get: fn (float $value) => '$ '.number_format($value, 0, '.', ' '),
//        );
//    }
//    public function salesPrice(): Attribute
//    {
//        return Attribute::make(
//            get: fn (float $value) => number_format($value, 0, '.', ' '),
//        );
//    }



    public function product()
    {
        return $this->belongsTo(ProductName::class, 'product_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function totalSale()
    {
        return $this->belongsTo(TotalSale::class, 'sales_order', 'sales_order');
    }
}
