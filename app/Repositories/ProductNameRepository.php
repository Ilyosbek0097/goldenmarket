<?php

namespace App\Repositories;

use App\Models\ProductName;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;

class ProductNameRepository implements ProductNameRepositoryInterfaces
{
    protected ProductName $productName;
    public function __construct(ProductName $productName)
    {
        $this->productName = $productName;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
       return $this->productName->paginate(10);
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return $this->productName->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function store($data)
    {
       return $this->productName->create($data->all());
    }

    /**
     * @inheritDoc
     */
    public function update($data, $id)
    {
        $requestAll = $data->except('_token','_method');
        return $this->productName->find($id)->update($requestAll);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        return $this->productName->destroy($id);
    }
}
