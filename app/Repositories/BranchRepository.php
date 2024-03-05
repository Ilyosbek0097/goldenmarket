<?php

namespace App\Repositories;

use App\Models\Branch;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use Illuminate\Http\Request;

class BranchRepository implements BranchRepositoryInterfaces
{

    protected Branch $branch;

    public function __construct(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function all()
    {
        // TODO: Implement all() method.
       return $this->branch->all();
    }
    public function get($id)
    {
        // TODO: Implement get() method.
        return $this->branch->findOrFail($id);
    }
    public function store($data)
    {
        // TODO: Implement store() method.

        $requestData = $data->all();

        if($data->hasFile('image'))
        {
            $file = $data->file('image');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/', $image_name);
            $requestData['image'] = $image_name;
            return $this->branch->create($requestData);
        }




    }
    public function update($id, $data)
    {
        $requestData  = $data->except('image', '_token', '_method');

        if($data->hasFile('image'))
        {
            //Image New Upload
            $file = $data->file('image');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/', $imageName);
            $requestData['image'] = $imageName;
            return $this->branch->whereId($id)->update($requestData);

        }
        else{
            //Image Old
            return  $this->branch->whereId($id)->update($data->except('image','_token','_method'));
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        if(!empty($id))
        {
            return $this->branch->destroy($id);
        }
    }

}
