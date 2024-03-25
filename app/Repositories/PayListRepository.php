<?php
namespace App\Repositories;

use App\Models\PayList;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;

class PayListRepository implements PayListRepositoryInterfaces
{
    protected  PayList $payList;
    public function __construct(PayList $payList)
    {
        $this->payList = $payList;
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
       return $this->payList->create($data);
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
