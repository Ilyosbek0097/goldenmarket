<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductNameStoreRequest;
use App\Models\Brand;
use App\Models\ProductName;
use App\Models\Type;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductNameController extends Controller
{
    protected ProductNameRepositoryInterfaces $productNameRepository;
    public function __construct(ProductNameRepositoryInterfaces $productNameRepository)
    {
        $this->productNameRepository = $productNameRepository;
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
        $barcode = ProductName::latest() ?? '10000';
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
    public function show(ProductName $productName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductName $productName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductName $productName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductName $productName)
    {
        //
    }
}
