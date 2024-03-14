<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseStoreRequest;
use App\Models\Warehouse;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use App\Repositories\WarehouseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected WarehouseRepositoryInterfaces $warehouseRepository;
    protected AddProductRepositoryInterfaces $addProductRepository;
    public function __construct(
            WarehouseRepositoryInterfaces $warehouseRepository,
            AddProductRepositoryInterfaces $addProductRepository,
        )
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->addProductRepository = $addProductRepository;
    }

    public function index()
    {
        return view('user.warehouse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addProductAll = $this->addProductRepository->all();
        return view('user.warehouse.create', compact('addProductAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseStoreRequest $request)
    {
//        return $request;
        return $this->execute(function() use ($request){
           $this->warehouseRepository->store($request);
           $addProductAll = $this->addProductRepository->all();
           return redirect()->route('warehouses.create', ['addProductAll' => $addProductAll ])->with('success', "Ma'lumot Bazaga Kiritildi!");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
    protected function execute(callable $callback)
    {
        DB::beginTransaction();
        try{
            $result  = $callback();
            DB::commit();
            return $result;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('warehouses.index')->with('error', $e->getMessage());
        }

    }
}
