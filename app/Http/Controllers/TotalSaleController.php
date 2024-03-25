<?php

namespace App\Http\Controllers;

use App\Http\Requests\TotalSaleStoreRequest;
use App\Models\TotalSale;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use App\Repositories\Interfaces\TotalSaleRepositoryInterfaces;
use Illuminate\Http\Request;

class TotalSaleController extends Controller
{
    protected TotalSaleRepositoryInterfaces $totalSaleRepository;
    protected PayListRepositoryInterfaces $payListRepository;
    public function __construct(TotalSaleRepositoryInterfaces $totalSaleRepository, PayListRepositoryInterfaces $payListRepository)
    {
        $this->totalSaleRepository = $totalSaleRepository;
        $this->payListRepository = $payListRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TotalSaleStoreRequest $request)
    {

       $dataTotalSale = [];
       $dataPayList = [];
       $dataClient = [];
       $requestAll = $request->all();
       $dataTotalSale = [
           'sales_order' =>  $requestAll['sales_order'],
           'total_sales' => $requestAll['total_sales'],
           'discount' => $requestAll['discount_id'],
           'final_sales' => $requestAll['final_sales'],
           'caller_id' => $requestAll['user_id'] ?? '',
           'user_id' => auth()->id(),
           'client_id' => 0,
       ];
       if($requestAll['full_name'] != '')
       {
           $dataClient = [
               'full_name' => $requestAll['full_name'],
               'address' => $requestAll['address'],
               'phone1' => $requestAll['phone1'],
               'phone2' => $requestAll['phone2']
           ];
       }


       $this->totalSaleRepository->store($dataTotalSale);

       $lastTotalSale =  $this->totalSaleRepository->last($requestAll['sales_order']);

       if($requestAll['pay_cash'] > 0 && $requestAll['pay_plastic'] >0)
       {
           $dataPayList_cash =
               [
                   'total_sale_id' => $lastTotalSale->id,
                   'date' =>date('Y-m-d'),
                   'pay_sum' => $requestAll['pay_cash'],
                   'pay_type' => 'naqd',
                   'in_out_status' => '0',
                   'check_status' => '0',
                   'insert_user_id' => auth()->id(),
                   'comment' => ''
               ];
           $this->payListRepository->store($dataPayList_cash);
           $dataPayList_plastic =
               [
                   'total_sale_id' => $lastTotalSale->id,
                   'date' => date('Y-m-d'),
                   'pay_sum' => $requestAll['pay_plastic'],
                   'pay_type' => 'plastik',
                   'in_out_status' => '0',
                   'check_status' => '0',
                   'insert_user_id' => auth()->id(),
                   'comment' => ''
               ];
           $this->payListRepository->store($dataPayList_plastic);

       }
       else{

           $dataPayList = [
               'total_sale_id' => $lastTotalSale->id,
               'date' => date('Y-m-d'),
               'pay_sum' => $requestAll['pay_cash'] ==0 ? $requestAll['pay_plastic'] : $requestAll['pay_cash'],
               'pay_type' => $requestAll['pay_cash'] ==0 ? 'plastic' :'naqd',
               'in_out_status' => '0',
               'check_status' => '0',
               'insert_user_id' => auth()->id(),
               'comment' => ''
           ];
           $this->payListRepository->store($dataPayList);
       }



    }

    /**
     * Display the specified resource.
     */
    public function show(TotalSale $totalSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TotalSale $totalSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TotalSale $totalSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TotalSale $totalSale)
    {
        //
    }
}
