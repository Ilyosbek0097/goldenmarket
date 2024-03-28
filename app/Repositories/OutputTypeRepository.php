<?php
namespace App\Repositories;

use App\Models\OutputType;
use App\Repositories\Interfaces\OutputTypeRepositoryInterfaces;

class OutputTypeRepository implements OutputTypeRepositoryInterfaces
{
    public function __construct(protected OutputType $outputType)
    {
    }

    public function all()
    {
        if (auth()->user()->role == 'user')
        {
           return $this->outputType->whereIn('branch_id', [0, auth()->id()])->get();
        }
        else{
            return $this->outputType->all();
        }

    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
        return $this->outputType->create($data->all());
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
