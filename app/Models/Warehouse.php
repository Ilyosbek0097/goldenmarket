<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function productname()
    {
        return $this->belongsTo(ProductName::class, 'product_id', 'id');
    }
    public function mark()
    {
        return $this->belongsTo(Mark::class, 'mark_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
