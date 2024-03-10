<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductNameStoreRequest;
use App\Http\Requests\ProductNameUpdateRequest;
use App\Models\Brand;
use App\Models\ProductName;
use App\Models\Type;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;
use App\Repositories\Interfaces\TypeRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductNameController extends Controller
{
    protected ProductNameRepositoryInterfaces $productNameRepository;
    protected  TypeRepositoryInterfaces $typeRepository;
    protected BrandRepositoryInterfaces $brandRepository;
    public function __construct(
        ProductNameRepositoryInterfaces $productNameRepository,
        TypeRepositoryInterfaces $typeRepository,
        BrandRepositoryInterfaces $brandRepository
    )
    {
        $this->productNameRepository = $productNameRepository;
        $this->typeRepository = $typeRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productNameAll = $this->productNameRepository->all();
        return view('admin.productname.index', compact('productNameAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barcode = ProductName::latest('barcode')->first() ?? '';
        $typeAll = Type::all();
        $brandAll = Brand::all();
        return view('admin.productname.create', compact('typeAll', 'brandAll', 'barcode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductNameStoreRequest $request)
    {
        DB::beginTransaction();
        $result = [
            'status' => 200
        ];
        try{
            $this->productNameRepository->store($request);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        if($result['status'] == 200)
        {
            return redirect()->route('productnames.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        }
        else{
            return redirect()->route('productnames.index')->with('error', "Xatolik Sodir Bo'ldi");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productname = $this->productNameRepository->get($id);
        return view('admin.productname.show', compact('productname'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $typeAll = $this->typeRepository->all();
        $brandAll = $this->brandRepository->all();
        $productname = $this->productNameRepository->get($id);
        return view('admin.productname.edit', compact('productname', 'typeAll', 'brandAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductNameUpdateRequest $request, $id)
    {

        DB::beginTransaction();
        $result = [
            'status' => 200
        ];
        try{
           $this->productNameRepository->update($request, $id);
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
            return redirect()->route('productnames.index')->with('success', "Ma'lumotlar Muvaffaqiyatli O'zgartirildi!");
        }
        else{
            return  redirect()->route('productnames.index')->with('error', "Xatolik Sodir Bo'ldi!");
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
            $this->productNameRepository->delete($id);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        if($result['status'] == 200)
        {
            return redirect()->route('productnames.index')->with('success',"Ma'lumot Muvaffaqiyatli O'chirildi!");
        }
        else{
            return redirect()->route('productnames.index')->with('error', "Xatolik Sodir Bo'ldi");
        }
    }
}
