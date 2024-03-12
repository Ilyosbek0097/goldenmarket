<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductName extends Model
{
    use HasFactory;

    protected $guarded =[];

    /**
     * @param $id
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id', 'type_id');
//        return Type::where('type_id', $id)->first();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function brand()
    {
//        return Brand::where('brand_id', $id)->first();
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
}
