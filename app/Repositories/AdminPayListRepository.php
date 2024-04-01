<?php
namespace App\Repositories;

use App\Models\AdminPayList;
use App\Repositories\Interfaces\AdminPayListRepositoryInterfaces;

class AdminPayListRepository implements AdminPayListRepositoryInterfaces
{

    public function __construct(protected AdminPayList $adminPayList)
    {

    }

    public function all()
    {
        return $this->adminPayList->all();
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
      return $this->adminPayList->create($data);
    }

    public function delete($id)
    {
       return $this->adminPayList->destroy($id);
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function payTotal($in_out_status, $tip, $check_status)
    {
        return $this->adminPayList
            ->where('in_out_status', $in_out_status)
            ->where('check_status', $check_status)
            ->where('pay_type', $tip)
            ->sum('pay_sum');
    }
    public function outputstore($data)
    {
      return $this->adminPayList->create($data);
    }
}
