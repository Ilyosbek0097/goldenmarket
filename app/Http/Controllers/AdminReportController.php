<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CashSale;
use App\Models\PayList;
use App\Models\TotalSale;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{


    public function __construct(
       protected CashSalesRepositoryInterfaces  $cashSaleRepository,
        protected CashSale $cashSale,
        protected TotalSale $totalSale,
        protected PayList $payList,
        protected Branch $branch,
        )
    {

    }

    public function index()
    {
        $cashSaleAll = $this->cashSaleRepository->all();
        return view('admin.report.index', compact('cashSaleAll'));
    }
    public function cash_sale_report(Request $request)
    {
//        return $request;
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        $cashSaleAll =  $this->cashSale->whereBetween( 'created_at', [$request->from_date .' 00:00:00', $request->to_date.' 23:59:50'])->get();
        return view('admin.report.index', compact('cashSaleAll'));
    }


    public function total_sale_report()
    {

        $totalSaleAll = $this->totalSale->orderBy('id', 'DESC')->get();
        return view('admin.report.total_sale', compact('totalSaleAll'));

    }
    public function total_sale_filtr(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        $totalSaleAll = $this->totalSale->whereBetween('created_at', [ $request->from_date.' 00:00:01', $request->to_date.' 23:59:58'])->get();
        return view('admin.report.total_sale', compact('totalSaleAll'));
    }
    public function caller()
    {
        $callerData = $this->totalSale
            ->select(DB::raw("count(id) as soni, sum(final_sales) as summa, caller_id"))
            ->groupBy('caller_id')
            ->get();
        return view('admin.report.caller', compact('callerData'));
    }

    public function caller_report(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        $callerData = $this->totalSale
            ->select(DB::raw("count(id) as soni, sum(final_sales) as summa, caller_id"))
            ->whereBetween('created_at', [ $request->from_date.' 00:00:01', $request->to_date.' 23:59:58'])
            ->groupBy('caller_id')
            ->get();
        return view('admin.report.caller', compact('callerData'));
    }
    public function usercash()
    {
        $cashAll = $this->payList->all();
        $branchAll  = $this->branch->all();
        return view('admin.report.usercash', compact('cashAll', 'branchAll'));
    }
    public function usercash_report(Request $request)
    {
        $branchAll = $this->branch->all();
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required'
        ]);

        if($request->branch != 0)
        {
            $cashAll = $this->payList
                ->where('branch_id', $request->branch)
                ->whereBetween('created_at', [ $request->from_date.' 00:00:01', $request->to_date.' 23:59:58'])
                ->orderBy('created_at','DESC')
                ->get();

        }
        else{
            $cashAll = $this->payList
                ->whereBetween('created_at', [ $request->from_date.' 00:00:01', $request->to_date.' 23:59:58'])
                ->orderBy('created_at','DESC')
                ->get();
        }

        return view('admin.report.usercash', compact('cashAll', 'branchAll'));
    }
}
