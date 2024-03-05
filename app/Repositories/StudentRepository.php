<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterfaces;

class StudentRepository implements StudentRepositoryInterfaces
{
    protected Student $student;
    public function __construct(Student $student)
    {
        $this->student = $student;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        // TODO: Implement all() method.
        return $this->student->all();
    }

    /**
     * @param $id
     * @return void
     */
    public function get($id)
    {
        // TODO: Implement get() method.
        return $this->student->findOrFail($id);
    }

    /**
     * @param $data
     * @return void
     */
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
            return $this->student->create($requestData);
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
            return $this->student->whereId($id)->update($requestData);
        }
        else{
            //Image Old
            return  $this->student->whereId($id)->update($data->except('image','_token','_method'));
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        if(!empty($id))
        {
            $this->student->destroy($id);
        }
    }
}
