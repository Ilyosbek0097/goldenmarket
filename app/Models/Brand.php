<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    use HasFactory;
    protected  $primaryKey = 'brand_id';

    protected $guarded  = [];

    public function types()
    {
        return $this->hasOne(Type::class,'type_id','brand_id');
    }
    public function getType($id)
    {
        $oneType = Type::where('type_id', $id)->first();
        return $oneType;
    }
    public function productName()
    {
        return $this->hasMany(ProductName::class);
    }
}
