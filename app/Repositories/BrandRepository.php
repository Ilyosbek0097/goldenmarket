<?php
namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;

class BrandRepository implements BrandRepositoryInterfaces
{
    protected Brand $brand;
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function all()
    {
        return $this->brand->cursorPaginate(10);

    }

    public function get($id)
    {
       return $this->brand->findOrFail($id);
    }

    public function store($data)
    {
        $requestAll = $data->all();
        return $this->brand->create($requestAll);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
       $requestAll = $data->all();
       return $this->brand->find($id)->update($requestAll);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
