<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Teacher;
use App\Repositories\Interfaces\TeacherRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    protected TeacherRepositoryInterfaces $teacherRepository;
    public function __construct(TeacherRepositoryInterfaces $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->teacherRepository->all();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TeacherStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeacherStoreRequest $request)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->teacherRepository->store($request);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];

        }
        if($result['status'] == 200)
        {
            return redirect()->route('teachers.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        }
        else{
            return redirect()->route('teachers.index')->with('error', "Xatolik Sodir Bo'ldi!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $teacherOne = $this->teacherRepository->get($id);
        return view('admin.teacher.show', compact('teacherOne'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $teacherOne = $this->teacherRepository->get($id);
        return view('admin.teacher.edit', compact('teacherOne'));
    }

    /**
     * Update the specified resource in storage.
     * @param TeacherUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->teacherRepository->update($id, $request);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];

        }
        if($result['status'] == 200)
        {
            return redirect()->route('teachers.index')->with('success', "Ma'lumotlar Tahrirlandi!");
        }
        else{
            return redirect()->route('teachers.index')->with('error', "Xatolik Sodir Bo'ldi!");
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->teacherRepository->delete($id);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        if($result['status'] == 200)
        {
            return redirect()->route('teachers.index')->with('success', "Ma'umot O'chirildi!");
        }
        else{
            return redirect()->route('teachers.index')->with('error', "Xatolik Sodir Bo'ldi!");
        }
    }
}
