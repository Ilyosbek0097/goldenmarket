<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\Type;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BrandController extends Controller
{
    protected BrandRepositoryInterfaces $brandRepository;
    public function __construct(BrandRepositoryInterfaces $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brandAll = $this->brandRepository->all();
        return view('admin.brand.index', compact('brandAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeAll = Type::all();
        return view('admin.brand.create', compact('typeAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        DB::beginTransaction();

        $result = [
            'status' => 200
        ];

        try {
            $this->brandRepository->store($request);

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();

            $result = [
                'status' => 500,
                'error' => "Xatolik Sodir Bo'ldi",
            ];
        }

        if($result['status'] == 200)
        {
            return redirect()->route('brands.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        }
        else{
            return  redirect()->route('brands.index')->with('error', "Xatolik Sodir Bo'ldi?");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brandOne = $this->brandRepository->get($id);
        return view('admin.brand.show', compact('brandOne'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $typeAll = Type::all();
        return view('admin.brand.edit', compact('brand', 'typeAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        $result = [
            'status' => 200,
        ];
        try {

            $this->brandRepository->update($request, $id);
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        if($result['status'] == 200)
        {
            return redirect()->route('brands.index')->with('success',"Ma'lumotlar Muvaffaqiyatli O'zgartirildi!");
        }
        else{
            return redirect()->route('brands.index')->with('error',"Xatolik Sodir Bo'ldi");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
