<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Repositories\Interfaces\TypeRepositoryInterfaces;

class TypeController extends Controller
{
    protected TypeRepositoryInterfaces $typeRepository;

    public function __construct(TypeRepositoryInterfaces $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeAll = $this->typeRepository->all();

        return view('admin.type.index', compact('typeAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeStoreRequest $request)
    {
        DB::beginTransaction();

        $result = ['status' => 200];

        try{

            $this->typeRepository->store($request);
            DB::commit();
        }
        catch(\Exception $e){

            DB:rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        if($result['status'] == 200)
        {
            return \redirect()->route('types.index')->with('success', "Ma'lumotlar Bazaga Kirtildi!");
        }
        else{
            return redirect()->route('types.index')->with('error', "Xatolik Sodir Bo'ldi");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeOne = $this->typeRepository->get($id);
        return view('admin.type.show', compact('typeOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $typeOne = $this->typeRepository->get($id);
        return view('admin.type.edit', compact('typeOne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeUpdateRequest $request, $id)
    {
        DB::beginTransaction();

        $result = [
            'status' => 200
        ];

        try{

            $this->typeRepository->update($request, $id);

            DB::commit();
        }
        catch(\Exception $e){

            DB::rollBack();

            return $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        if($result['status'] == 200)
        {
            return redirect()->route('types.index')->with('success', "Ma'lumotlar Muvaffaqiyatli O'zgartirildi!");
        }
        else{
            return redirect()->route('types.index')->with('error',"Xatolik Sodir Bo'ldi!");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        $result = [
            'status' => 200
        ];

        try{

            $this->typeRepository->delete($id);

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        if($result['status'] == 200)
        {
            return redirect()->route('types.index')->with('success', "Ma'lumotlar Muvaffaqiyatli O'chirildi!");
        }
        else{

            return redirect()->route('types.index')->with('error', $result['error']);
        }
    }
}
