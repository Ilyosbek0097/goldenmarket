<?php
namespace App\Repositories;

use App\Models\Brand;
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
    public function update($data, $id)
    {
        $type = $this->type->findOrFail($id);
        $type->update($data->except('_token', '_method'));
        return $type;
    }
    public function delete($id)
    {
        if( !empty($id) )
        {
            $findType = Brand::where('type_id', '=',  $id)->first();
//            return $findType;
            if(!$findType)
            {
                return $this->type->destroy($id);
            }
            else{
                return false;
            }

        }
    }
}
