<?php

namespace App\Repositories;

use App\Models\AddProduct;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;

class AddProductRepository implements AddProductRepositoryInterfaces
{
    protected AddProduct $addProduct;
    public function __construct(AddProduct $addProduct)
    {
        $this->addProduct = $addProduct;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
      return $this->addProduct->all();
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return $this->addProduct->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function store($data)
    {
        $requestAll1 = ['user_id' => Auth::user()->id];
        $requestAll = array_merge($requestAll1, $data->all());
      return $this->addProduct->create($requestAll);
    }

    /**
     * @inheritDoc
     */
    public function update($data, $id)
    {
        $addProductOne  = $this->addProduct->find($id);
        $requestAll = $data->all();

        if($addProductOne['check_status'] == 2)
        {
          $requestAll = ['check_status' => 1];
          $requestAll = array_merge($requestAll, $data->all);
        }
        return $this->addProduct->find($id)->update($requestAll);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
       return $this->addProduct->destroy($id);
    }
}
