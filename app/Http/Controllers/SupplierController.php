<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    protected SupplierRepositoryInterfaces $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplierAll = $this->supplierRepository->all();
        return view('admin.supplier.index', compact('supplierAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierStoreRequest $request)
    {
        DB::beginTransaction();
        $result = [
            'status' => 200
        ];

        try {

          $this->supplierRepository->store($request);

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        if ($result['status'] == 200)
        {
            return redirect()->route('suppliers.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        }
        else{
            return redirect()->route('suppliers.index')->with('error', $result['error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplierOne = $this->supplierRepository->get($id);
        return view('admin.supplier.show', compact('supplierOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplierOne = $this->supplierRepository->get($id);
      return view('admin.supplier.edit', compact('supplierOne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        $result = [
            'status' => 200
        ];
        try{

            $this->supplierRepository->update($request, $id);
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
            return redirect()->route('suppliers.index')->with('success', "Ma'lumotlar Muvaffaqiyatli Tahrirlandi!");
        }
        else{

            return  redirect()->route('suppliers.index')->with('error', "Xatolik Sodir Bo'ldi!");
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

            $this->supplierRepository->delete($id);
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
            return redirect()->route('suppliers.index')->with('success', "Ma'lumotlar Muvaffaqiyatli O'chirildi!");
        }
        else{

            return  redirect()->route('suppliers.index')->with('error', "Xatolik Sodir Bo'ldi!");
        }
    }
}
