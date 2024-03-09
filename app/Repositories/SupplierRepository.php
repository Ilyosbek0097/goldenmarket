<?php
namespace App\Repositories;

use App\Models\Supplier;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;

class SupplierRepository implements SupplierRepositoryInterfaces
{
    protected Supplier $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function all()
    {
        return $this->supplier->paginate(10);
    }

    public function get($id)
    {
       return $this->supplier->findOrFail($id);
    }

    public function store($data)
    {
        $requestAll = ['user_id' => Auth::user()->id];
        $requestAll= array_merge($requestAll,$data->all());
//        return $requestAll;
       return $this->supplier->create($requestAll);
    }

    public function update($data, $id)
    {
      return $this->supplier->find($id)->update($data->all());
    }

    public function delete($id)
    {
        return $this->supplier->destroy($id);
    }
}
