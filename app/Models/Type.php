<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = 'type_id';
    protected $guarded = [];

    /**
     * Get all of the brand for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brends(): HasMany
    {
        return $this->hasMany(Brand::class, 'brand_id', 'type_id');
    }
}
