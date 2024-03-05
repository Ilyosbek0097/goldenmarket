<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\Interfaces\TeacherRepositoryInterfaces;

class TeacherRepository implements TeacherRepositoryInterfaces
{
    protected Teacher $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }
    public function all()
    {
        // TODO: Implement all() method.
        return Teacher::all();
    }
    public function get($id)
    {
        // TODO: Implement get() method.
        return $this->teacher->findOrFail($id);
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
            return $this->teacher->create($requestData);
        }
    }
    public function update($id,$data)
    {
        // TODO: Implement update() method.
        $requestData  = $data->except('image', '_token', '_method');
        if($data->hasFile('image'))
        {
            //Image New Upload
            $file = $data->file('image');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/', $imageName);
            $requestData['image'] = $imageName;
            return $this->teacher->whereId($id)->update($requestData);
        }
        else{
            //Image Old
            return  $this->teacher->whereId($id)->update($data->except('image','_token','_method'));
        }
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
        if(!empty($id))
        {
            return $this->teacher->destroy($id);
        }
    }
}
