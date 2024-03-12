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
        return view('admin.addproduct.index');
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
        if($addProductAll == null)
        {
            $addProductOne = '';
        }
        else{
            $addProductOne = $addProductAll->last();
        }
        $markAll = $this->markRepository->all();

        return view('admin.addproduct.create', compact('productNameAll', 'supplierAll', 'branchAll','addProductOne', 'markAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductStoreRequest $request)
    {
        return $request;
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
}
