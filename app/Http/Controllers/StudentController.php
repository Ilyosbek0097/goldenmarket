<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Branch;
use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected StudentRepositoryInterfaces $studentRepository;
    public function __construct(StudentRepositoryInterfaces $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $students = $this->studentRepository->all();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student_code = random_int(1000000000000,9999999999999);
        $branchs = Branch::all();
        return view('admin.student.create', compact('student_code','branchs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StudentStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentStoreRequest $request)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->studentRepository->store($request);
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
            return redirect()->route('students.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        }
        else{
            return redirect()->route('students.index')->with('error', $result['error']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $studentOne =  $this->studentRepository->get($id);
       return view('admin.student.show', compact('studentOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $branchs = Branch::all();
        return view('admin.student.edit', compact('student', 'branchs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->studentRepository->update($id, $request);
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
            return redirect()->route('students.index')->with('success', "Ma'lumotlar Tahrirlandi!");
        }
        else{
            return redirect()->route('students.index')->with('error', $result['error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $result = ['status' => 200];

        try {
            $this->studentRepository->delete($id);
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
            return redirect()->route('students.index')->with('success', "Ma'lumot O'chirildi!");
        }
        else{
            return redirect()->route('students.index')->with('error', "Xatolik Sodir Bo'ldi");
        }
    }
}
