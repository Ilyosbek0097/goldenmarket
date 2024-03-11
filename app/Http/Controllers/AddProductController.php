<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    protected AddProductRepositoryInterfaces $addProductRepository;
    public function __construct(AddProductRepositoryInterfaces $addProductRepository)
    {
        $this->addProductRepository = $addProductRepository;
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
        return view('admin.addproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
