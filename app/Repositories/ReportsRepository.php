<?php
namespace App\Repositories;

use App\Models\AddProduct;
use App\Repositories\Interfaces\ReportsRepositoryInterfaces;

class ReportsRepository implements ReportsRepositoryInterfaces
{
    public function __construct(
        protected AddProduct $addProduct
        )
    {

    }

    public function export_add_product()
    {
        return $this->addProduct->with('productname', 'branch', 'supplier', 'mark', 'user')
            ->where('branch_id', auth()->user()->branch_id)
            ->get();
    }

    public function add_product_report($data)
    {
        if($data->first_date)
        {
            return $this->addProduct->with('productname', 'branch', 'supplier', 'mark', 'user')
                ->where('branch_id', auth()->user()->branch_id)
                ->whereBetween('register_date', [$data->first_date, $data->last_date])
                ->get();
        }
        else {
            return $this->addProduct->with('productname', 'branch', 'supplier', 'mark', 'user')
                ->where('branch_id', auth()->user()->branch_id)
                ->get();
        }
    }
}
