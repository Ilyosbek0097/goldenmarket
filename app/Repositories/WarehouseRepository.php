<?php
namespace App\Repositories;

use App\Models\AddProduct;
use App\Models\Warehouse;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarehouseRepository implements WarehouseRepositoryInterfaces
{
    protected Warehouse $warehouse;
    protected AddProduct $addProduct;
    public function __construct(Warehouse $warehouse, AddProduct $addProduct)
    {
        $this->warehouse = $warehouse;
        $this->addProduct = $addProduct;
    }

    public function all()
    {
        if(\auth()->user()->role == 'user')
        {
            return $this->warehouse->where('branch_id', auth()->user()->branch_id)->get();
        }
        else{
            return $this->warehouse->all();
        }

    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
        $addProductId = $data->addproduct_id;
        $check_status = $data->check_status;

        if($check_status != "")
        {
            $addProduct = $this->addProduct->where('id', $addProductId)->first();

            $hasProduct = $this->warehouse
                ->where('product_id', $addProduct->product_id)
                ->where('branch_id', $addProduct->branch_id)
                ->first();

            if($check_status == 1)
            {
                if($hasProduct)
                {
                    $updateWarehouse = $this->warehouse->find($hasProduct->id)->update([
                        'amount' => DB::raw('amount + '.$addProduct->amount),
                        'body_price_uzs' => $addProduct->body_price_uzs,
                        'body_price_usd' => $addProduct->body_price_usd,
                        'sales_price' => $addProduct->sales_price,
                        'user_id' => Auth::id(),
                        'mark_id' => $addProduct->mark_id,
                    ]);

                }
                else{
                    $createWarehouse =  $this->warehouse->create([
                        'product_id' => $addProduct->product_id,
                        'branch_id' => $addProduct->branch_id,
                        'user_id' => Auth::user()->id,
                        'amount' => $addProduct->amount,
                        'body_price_uzs' => $addProduct->body_price_uzs,
                        'body_price_usd' => $addProduct->body_price_usd,
                        'sales_price' => $addProduct->sales_price,
                        'mark_id' => $addProduct->mark_id,
                    ]);

                }
                return $this->addProduct->find($addProductId)->update(['check_status' => $check_status]);
            }
            elseif ($check_status == 2)
            {
                return $this->addProduct->find($addProductId)->update(['check_status' => $check_status]);
            }
            else{
                return false;
            }
        }



    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
