<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchStoreRequest;
use App\Http\Requests\BranchUpdateRequest;
use App\Models\Branch;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use App\Services\BranchServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{

    protected BranchRepositoryInterfaces $branchRepository;

    public function __construct(BranchRepositoryInterfaces $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchAll = $this->branchRepository->all();
        return view('admin.branch.index', compact('branchAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchStoreRequest $request)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->branchRepository->store($request);
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
          return redirect()->route('branchs.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
      }
      else{
          return redirect()->route('branchs.index')->with('error', "Xatolik Sodir Bo'ldi!");
      }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branchOne = $this->branchRepository->get($id);
        return view('admin.branch.show', compact('branchOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branchOne = $this->branchRepository->get($id);
        return view('admin.branch.edit', compact('branchOne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchUpdateRequest $request, string $id)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try {
            $this->branchRepository->update($id,$request);
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
            return redirect()->route('branchs.index')->with('success', "Ma'lumotlar Tahrirlandi!");
        }
        else{
            return redirect()->route('branchs.index')->with('error', "Xatolik Sodir Bo'ldi!");
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
            $this->branchRepository->delete($id);
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
            return redirect()->route('branchs.index')->with('success', "Ma'umot O'chirildi!");
        }
        else{
            return redirect()->route('branchs.index')->with('error', "Xatolik Sodir Bo'ldi!");
        }

    }
}
