<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayList extends Model
{
    use HasFactory;
    protected  $guarded = [];

    protected function outputtype()
    {
        return $this->belongsTo(OutputType::class, 'output_type_id');
    }
    protected function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
