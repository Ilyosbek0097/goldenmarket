<?php
namespace App\Repositories;

use App\Models\Type;
use App\Repositories\Interfaces\TypeRepositoryInterfaces;



class TypeRepository implements TypeRepositoryInterfaces
{
    protected Type $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function all()
    {
        return $this->type->cursorPaginate(10);
    }
    public function get($id)
    {
        return $this->type->findOrFail($id);
    }
    public function store($data)
    {
        $requestData = $data->all();
        return $this->type->create($requestData);
    }
    public function update($id, array $data)
    {

    }
    public function delete($id)
    {

    }
}
