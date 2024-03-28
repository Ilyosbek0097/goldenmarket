<?php
namespace App\Repositories;

use App\Models\TotalSale;
use App\Repositories\Interfaces\TotalSaleRepositoryInterfaces;

class TotalSaleRepository implements TotalSaleRepositoryInterfaces
{
    public function __construct(protected TotalSale $totalSale)
    {
        $this->totalSale = $totalSale;
    }

    public function all()
    {
        return $this->totalSale->where('canceled', '0')->where('branch_id', auth()->user()->branch_id)->orderBy('id', 'DESC')->get();
    }

    public function get($id)
    {

    }

    public function store($data)
    {
        return $this->totalSale->create($data);
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function last($invoice)
    {
        return $this->totalSale->where('sales_order', $invoice)->where('user_id', auth()->id())->first();
    }

}
