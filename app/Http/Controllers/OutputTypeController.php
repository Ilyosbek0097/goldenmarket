<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutputTypeRequest;
use App\Models\OutputType;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use App\Repositories\Interfaces\OutputTypeRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutputTypeController extends Controller
{
    public function __construct(
            protected OutputTypeRepositoryInterfaces $outputTypeRepository,
            protected BranchRepositoryInterfaces $branchRepository
        )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outputTypeAll = $this->outputTypeRepository->all();
        return view('admin.outputtype.index', compact('outputTypeAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $branchAll = $this->branchRepository->all();
        return view('admin.outputtype.create', compact('branchAll', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutputTypeRequest $request)
    {
        return $this->execute(function() use ($request){
            $this->outputTypeRepository->store($request);
            return redirect()->route('outputtypes.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(OutputType $outputType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutputType $outputType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OutputType $outputType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutputType $outputType)
    {
        //
    }

    public function execute(callable $callback)
    {
        DB::beginTransaction();
        try{
            $result = $callback();
            DB::commit();
            return $result;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error', "Xatolik Sodir Bo'ldi!");
        }

    }
}
