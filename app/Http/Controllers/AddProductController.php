<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductStoreRequest;
use App\Http\Requests\AddProductUpdateRequest;
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

        $markAll = $this->markRepository->all();

        return view('admin.addproduct.create', compact('addProductAll','productNameAll', 'supplierAll', 'branchAll', 'markAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductStoreRequest $request)
    {
//        return  $request;
        return $this->execute(function () use ($request){
            $this->addProductRepository->store($request);
            return redirect()->route('addproducts.index')->with('success', "Ma'lumotlar Bazaga Muvaffaqiyatli Kiritildi!");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $addproduct = $this->addProductRepository->get($id);
        return view('admin.addproduct.show', compact('addproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $addproductOne= $this->addProductRepository->get($id);
        $productNameAll = $this->productNameRepository->all();
        $supplierAll = $this->supplierRepository->all();
        $branchAll = $this->branchRepository->all();
        $addProductAll = $this->addProductRepository->all();
        $markAll = $this->markRepository->all();

        return view('admin.addproduct.edit', compact('addproductOne', 'productNameAll', 'supplierAll', 'markAll', 'branchAll', 'addProductAll'));
    }

    /**
     * Update the specified resource in storage.
     * @param AddProductUpdateRequest $request
     * @param $id
     */
    public function update(AddProductUpdateRequest $request , $id)
    {
        return $this->execute(function () use ($request, $id) {
            $this->addProductRepository->update($request, $id);
            return redirect()->route('addproducts.index')->with('success', "Ma'lumot Muvaffaqiyatli Tahrirlandi!");
        });
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
            return redirect()->back()->with('error', $e->getMessage())->withErrors($e->getMessage());
        }
    }
}
