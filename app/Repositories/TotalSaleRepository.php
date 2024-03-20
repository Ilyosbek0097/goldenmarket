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
        // TODO: Implement all() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
        // TODO: Implement store() method.
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
