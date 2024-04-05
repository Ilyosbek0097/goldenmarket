<?php
namespace App\Repositories;

use App\Models\AddProduct;
use App\Models\CashSale;
use App\Repositories\Interfaces\ReportsRepositoryInterfaces;
use Illuminate\Support\Facades\DB;

class ReportsRepository implements ReportsRepositoryInterfaces
{
    public function __construct(
        protected AddProduct $addProduct,
        protected CashSale $cashSale,
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

    /**

     */
    public function cash_sales_repository($data)
    {
      if($data->from_date)
      {
          return $this->cashSale->with('product', 'user', 'branch' )
                ->where('branch_id', auth()->user()->branch_id)
                ->where('check_status', 1)
                ->where('canceled', 0)
                ->whereBetween('created_at' , [$data->from_date, $data->to_date])
                ->get();

      }
      else
      {
          return $this->cashSale->with('product', 'user', 'branch' )
              ->where('branch_id', auth()->user()->branch_id)
              ->where('check_status', 1)
              ->where('canceled', 0)
              ->get();
      }
    }

}
