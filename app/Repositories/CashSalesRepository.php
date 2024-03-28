<?php
namespace App\Repositories;

use App\Models\CashSale;
use App\Models\Warehouse;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use Illuminate\Support\Facades\DB;

class CashSalesRepository implements CashSalesRepositoryInterfaces
{
    protected CashSale $cashsale;
    protected Warehouse $warehouse;
    public function __construct(CashSale $cashSale, Warehouse $warehouse)
    {
        $this->cashsale = $cashSale;
        $this->warehouse = $warehouse;

    }

    public function all()
    {
        if(auth()->user()->role == 'user')
        {
            return $this->cashsale->where('user_id', auth()->id())->whereIn('check_status', [0,1])->orderBy('id', 'DESC')->get();

        }
        else{
            return $this->cashsale->all();
        }
    }
    public function get($id)
    {
        return $this->cashsale->where('sales_order', $id)->where('check_status', 1)->get();
    }
    public function store($data)
    {
        $requestAll = $data->all();
        $warehouseProduct = $this->warehouse
                            ->where('branch_id', auth()->user()->branch_id)
                            ->where('product_id', $requestAll['product_id'])
                            ->first();
        $sales_order = $this->cashsale
                            ->select('sales_order')
                            ->max('sales_order');
        if($sales_order == null)
        {
            $sales_order = 1;
        }
        else{
            $sales_order_user = $this->cashsale
                            ->where('check_status', '0')
                            ->where('user_id', auth()->id())
                            ->first();
            if($sales_order_user != null)
            {
                $sales_order = $sales_order_user->sales_order;
            }
            else{
                $sales_order++;
            }
        }
        $cashSalesProduct = $this->cashsale
            ->where('product_id', $requestAll['product_id'])
            ->where('user_id', auth()->id())
            ->where('check_status', '0')
            ->first();
        if($cashSalesProduct != null)
        {
            $this->warehouse
                ->where('product_id', $cashSalesProduct->product_id)
                ->where('user_id', auth()->user()->branch_id)
                ->update([
                    'amount' => DB::raw('amount - '.$requestAll['amount'])
                ]);
            return $this->cashsale->where('product_id', $cashSalesProduct->product_id)->update([
                'amount' => DB::raw('amount + '.$requestAll['amount'])
            ]);
        }
        else{
            $this->warehouse
                ->where('product_id', $requestAll['product_id'])
                ->where('branch_id', auth()->user()->branch_id)
                ->update([
                    'amount' => DB::raw('amount - '.$requestAll['amount'])
                ]);
            return $this->cashsale->create([
                'product_id' => $requestAll['product_id'],
                'branch_id' => auth()->user()->branch_id,
                'user_id' => auth()->id(),
                'amount' => $requestAll['amount'],
                'body_price_usd' => $warehouseProduct->body_price_usd,
                'body_price_uzs' => $warehouseProduct->body_price_uzs,
                'sales_price' => $warehouseProduct->sales_price,
                'sales_order' => $sales_order,
                'check_status' => 0,
            ]);
        }

    }
    public function update($data, $id)
    {
        return $this->cashsale->where('sales_order', $id)->update($data);
    }
    public function delete($id)
    {
        $cashSales = $this->cashsale->find($id);
        $this->warehouse
            ->where('product_id', $cashSales->product_id)
            ->where('branch_id', auth()->user()->branch_id)
            ->update([
                'amount' => DB::raw('amount+'.$cashSales->amount)
            ]);
       return $this->cashsale->destroy($id);
    }

}
