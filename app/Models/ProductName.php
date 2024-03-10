<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductName extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $guarded =[];

    /**
     * @param $id
     * @return mixed
     */
    public function type($id)
    {
        return Type::where('type_id', $id)->first();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function brand($id)
    {
        return Brand::where('brand_id', $id)->first();
    }
}
