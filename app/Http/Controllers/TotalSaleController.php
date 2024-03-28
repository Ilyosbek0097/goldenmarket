<?php

namespace App\Http\Controllers;

use App\Http\Requests\TotalSaleStoreRequest;
use App\Models\TotalSale;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use App\Repositories\Interfaces\ClientRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use App\Repositories\Interfaces\TotalSaleRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalSaleController extends Controller
{
    protected TotalSaleRepositoryInterfaces $totalSaleRepository;
    protected PayListRepositoryInterfaces $payListRepository;
    protected ClientRepositoryInterfaces $clientRepository;
    protected CashSalesRepositoryInterfaces $cashSalesRepository;
    public function __construct(
            TotalSaleRepositoryInterfaces $totalSaleRepository,
            PayListRepositoryInterfaces $payListRepository,
            ClientRepositoryInterfaces $clientRepository,
            CashSalesRepositoryInterfaces $cashSalesRepository,

        )
    {
        $this->totalSaleRepository = $totalSaleRepository;
        $this->payListRepository = $payListRepository;
        $this->clientRepository = $clientRepository;
        $this->cashSalesRepository = $cashSalesRepository;
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

//       return $this->execute( function() use ($request){

           $dataTotalSale = [];
           $dataPayList = [];
           $dataClient = [];
           $requestAll = $request->all();
           $client = 0;
           if($requestAll['full_name'] != '')
           {
               $dataClient = [
                   'full_name' => $requestAll['full_name'],
                   'address' => $requestAll['address'],
                   'phone1' => $requestAll['phone1'],
                   'phone2' => $requestAll['phone2'],
                   'user_id' => auth()->id(),
                   'check_status' => 1
               ];
               $this->clientRepository->store($dataClient);

               $lastClient = $this->clientRepository->last(auth()->id());
               $client = $lastClient->client_id;
           }



           $dataTotalSale = [
               'sales_order' =>  $requestAll['sales_order'],
               'total_sales' => $requestAll['total_sales'],
               'discount' => $requestAll['discount_id'],
               'final_sales' => $requestAll['final_sales'],
               'caller_id' => $requestAll['user_id'] ?? '',
               'user_id' => auth()->id(),
               'branch_id' => auth()->user()->branch_id,
               'client_id' => $client
           ];



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
                       'check_status' => '1',
                       'insert_user_id' => auth()->id(),
                       'branch_id' => auth()->user()->branch_id,
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
                       'check_status' => '1',
                       'insert_user_id' => auth()->id(),
                       'branch_id' => auth()->user()->branch_id,
                       'comment' => ''
                   ];
               $this->payListRepository->store($dataPayList_plastic);

           }
           else{

               $dataPayList = [
                   'total_sale_id' => $lastTotalSale->id,
                   'date' => date('Y-m-d'),
                   'pay_sum' => $requestAll['pay_cash'] ==0 ? $requestAll['pay_plastic'] : $requestAll['pay_cash'],
                   'pay_type' => $requestAll['pay_cash'] ==0 ? 'plastik' :'naqd',
                   'in_out_status' => '0',
                   'check_status' => '1',
                   'insert_user_id' => auth()->id(),
                   'branch_id' => auth()->user()->branch_id,
                   'comment' => ''
               ];
               $this->payListRepository->store($dataPayList);
           }
           $dataCashSalesUpdate = ['check_status' => 1];
            $this->cashSalesRepository->update($dataCashSalesUpdate, $requestAll['sales_order']);

           return redirect()->route('cashsales.index')->with('success', "Ma'lumotlar Muvaffaqiyatli Kiritildi!");

//       });
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
    public function execute(callable $callback)
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
            return  redirect()->back()->with('error', "Xatolik Sodir Bo'ldi")->withErrors($e->getMessage());
        }
    }
}
