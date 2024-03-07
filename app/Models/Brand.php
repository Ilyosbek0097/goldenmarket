<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    use HasFactory;
    protected  $primaryKey = 'brand_id';

    protected $guarded  = [];

    public function types(): HasOne
    {
        return $this->hasOne(Type::class,'type_id', 'brand_id');
    }
}
