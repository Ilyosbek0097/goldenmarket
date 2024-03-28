<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashSaleStoreRequest;
use App\Models\CashSale;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use App\Repositories\Interfaces\TotalSaleRepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use Illuminate\Http\Request;

class CashSaleController extends Controller
{
    protected CashSalesRepositoryInterfaces $cashsalesRepository;
    protected WarehouseRepositoryInterfaces $warehouseRepository;
    protected UserRepositoryInterfaces $userRepository;
    protected TotalSaleRepositoryInterfaces $totalSaleRepository;
    public function __construct(
            CashSalesRepositoryInterfaces $cashsalesRepository,
            WarehouseRepositoryInterfaces $warehouseRepository,
            UserRepositoryInterfaces $userRepository,
            TotalSaleRepositoryInterfaces $totalSaleRepository,
        )
    {
        $this->cashsalesRepository = $cashsalesRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->userRepository = $userRepository;
        $this->totalSaleRepository = $totalSaleRepository;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $cashSaleAll = $this->cashsalesRepository->all();
        $totalSaleAll = $this->totalSaleRepository->all();
        return view('user.cashsale.index', compact('totalSaleAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouseProduct = $this->warehouseRepository->all();
        $cashSalesProduct = $this->cashsalesRepository->all();

        $userAll = $this->userRepository->all();

        return view('user.cashsale.create', compact('warehouseProduct','cashSalesProduct', 'userAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CashSaleStoreRequest $request)
    {

        $this->cashsalesRepository->store($request);
        $cashSalesProduct = $this->cashsalesRepository->all();
        return redirect()->back()->with([
                'success' => 'Kiritildi',
                'cashSalesProduct' => $cashSalesProduct,
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cashsaleOne = $this->cashsalesRepository->get($id);
        return view('user.cashsale.show', compact('cashsaleOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashSale $cashSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CashSale $cashSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $this->cashsalesRepository->delete($id);
       return redirect()->back()->with('success', "Ma'lumot O'chirildi!");
    }
}
