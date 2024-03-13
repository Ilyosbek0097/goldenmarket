<?php
namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterfaces;

class CurrencyRepository implements CurrencyRepositoryInterfaces
{
    protected Currency $currency;
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function all()
    {
       return $this->currency->all();
    }

    public function get($id)
    {
        return $this->currency->findOrFail($id);
    }

    public function store($data)
    {
       return $this->currency->create($data->all());
    }

    public function update($data, $id)
    {
       return $this->currency->find($id)->update($data->all());
    }

    public function delete($id)
    {
        return $this->currency->destroy($id);
    }
}
