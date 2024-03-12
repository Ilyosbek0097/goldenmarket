<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductStoreRequest;
use App\Models\AddProduct;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;
use App\Repositories\Interfaces\MarkRepositoryInterfaces;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProductController extends Controller
{
    protected AddProductRepositoryInterfaces $addProductRepository;
    protected ProductNameRepositoryInterfaces $productNameRepository;
    protected SupplierRepositoryInterfaces $supplierRepository;
    protected BranchRepositoryInterfaces $branchRepository;
    protected MarkRepositoryInterfaces $markRepository;

    /**
     * @param AddProductRepositoryInterfaces $addProductRepository
     * @param ProductNameRepositoryInterfaces $productNameRepository
     * @param SupplierRepositoryInterfaces $supplierRepository
     * @param BranchRepositoryInterfaces $branchRepository
     */
    public function __construct(
        AddProductRepositoryInterfaces $addProductRepository,
        ProductNameRepositoryInterfaces $productNameRepository,
        SupplierRepositoryInterfaces $supplierRepository,
        BranchRepositoryInterfaces $branchRepository,
        MarkRepositoryInterfaces $markRepository,
        )
    {
        $this->addProductRepository = $addProductRepository;
        $this->productNameRepository = $productNameRepository;
        $this->supplierRepository = $supplierRepository;
        $this->branchRepository = $branchRepository;
        $this->markRepository = $markRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addProductAll = $this->addProductRepository->all();
        return view('admin.addproduct.index', compact('addProductAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productNameAll = $this->productNameRepository->all();
        $supplierAll = $this->supplierRepository->all();
        $branchAll = $this->branchRepository->all();
        $addProductAll = $this->addProductRepository->all();
//        return  $addProductAll;
        if($addProductAll->total() > 0)
        {
            $addProductOne = $addProductAll->last();
            $invoice_order = AddProduct::groupBy('invoice_order')
                ->selectRaw('count(*) as total, invoice_order')
                ->get();

        }
        else{
            $addProductOne = '';
            $invoice_order = 0;
        }
        $markAll = $this->markRepository->all();

        return view('admin.addproduct.create', compact('invoice_order','productNameAll', 'supplierAll', 'branchAll','addProductOne', 'markAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductStoreRequest $request)
    {
        return $this->execute(function () use ($request){
            $this->addProductRepository->store($request);
            return redirect()->route('addproducts.index')->with('success', "Ma'lumotlar Bazaga Muvaffaqiyatli Kiritildi!");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(AddProduct $addProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddProduct $addProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddProduct $addProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddProduct $addProduct)
    {
        //
    }

    protected function execute(callable $callback)
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
            return redirect()->back()->with('error', "Xatolik Sodir Bo'ldi!")->withErrors($e->getMessage());
        }
    }
}
