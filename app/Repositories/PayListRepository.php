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
       return $this->payList->where('branch_id', auth()->user()->branch_id)->get();
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
    public function payTotal($status, $tip)
    {
        return $this->payList
            ->where('in_out_status', $status)
            ->where('check_status', 1)
            ->where('pay_type', $tip)
            ->where('branch_id', auth()->user()->branch_id)
            ->sum('pay_sum');
    }
}
