<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use App\Repositories\Interfaces\ReportsRepositoryInterfaces;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    public function __construct(
            protected WarehouseRepositoryInterfaces $warehouseRepository,
            protected AddProductRepositoryInterfaces $addProductRepository,
            protected ReportsRepositoryInterfaces $reportsRepository,
            protected CashSalesRepositoryInterfaces $cashSalesRepository,
            protected PayListRepositoryInterfaces $payListRepository,
        )
    {
    }

    public function index()
    {
        $product_all = $this->warehouseRepository->all();
        return view('user.report.index', compact('product_all'));
    }
    public function export_add_product()
    {
        $data = $this->reportsRepository->export_add_product();
        $file_name = 'add_product_report'.date('d-m-Y');
        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn( 'branch_name', function ($row){
                return $row->branch->name;
            })
            ->addColumn( 'register_date', function ($row){
                return Carbon::create($row->register_date)->format('d-m-Y');
            })
            ->addColumn('product_name', function($row){
                return $row->productname->type->type_name.' '.$row->productname->brand->brand_name.' '.$row->productname->model_name;
            })
            ->addColumn('supplier', function ($row){
                return $row->supplier->full_name;
            })
            ->addColumn('mark', function ($row){
                return number_format($row->mark->value, 0, '.', ' ').' %';
            })
            ->addColumn('body_price_uzs', function($row){
                return number_format($row->body_price_uzs, 0, '.', ' ');
            })
            ->addColumn('body_price_usd', function($row){
                return '$ '.number_format($row->body_price_usd, 0, '.', ' ');
            })
            ->addColumn('sales_price', function($row){
                return number_format($row->sales_price, 0, '.', ' ');
            })
            ->addColumn('user', function($row){
                return $row->user->name;
            })
            ->rawColumns(['product_name','branch_name', 'supplier', 'user', 'mark'])
            ->export()
            ->download($file_name);


    }
    public function add_product_report(Request $request)
    {
        $data = $this->reportsRepository->add_product_report($request);

       return DataTables::of($data)
           ->addIndexColumn()

           ->addColumn( 'branch_name', function ($row){
               return $row->branch->name;
           })
           ->addColumn( 'register_date', function ($row){
               return Carbon::create($row->register_date)->format('d-m-Y');
           })
           ->addColumn('product_name', function($row){
               return $row->productname->type->type_name.' '.$row->productname->brand->brand_name.' '.$row->productname->model_name;
           })
           ->addColumn('supplier', function ($row){
               return $row->supplier->full_name;
           })
           ->addColumn('mark', function ($row){
               return number_format($row->mark->value, 0, '.', ' ').' %';
           })
           ->addColumn('body_price_uzs', function($row){
               return number_format($row->body_price_uzs, 0, '.', ' ');
           })
           ->addColumn('body_price_usd', function($row){
               return '$ '.number_format($row->body_price_usd, 0, '.', ' ');
           })
           ->addColumn('sales_price', function($row){
               return number_format($row->sales_price, 0, '.', ' ');
           })
           ->addColumn('user', function($row){
               return $row->user->name;
           })
           ->rawColumns(['product_name','branch_name', 'supplier', 'user', 'mark'])
           ->make(true);


    }


    public function cash_sales_report(Request $request)
    {
        $data = $this->reportsRepository->cash_sales_repository($request);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn( 'branch_name', function ($row){
                return $row->branch->name;
            })
            ->addColumn( 'register_date', function ($row){
                return Carbon::create($row->created_at)->format('d-m-Y');
            })
            ->addColumn('product_name', function($row){
                return $row->product->type->type_name.' '.$row->product->brand->brand_name.' '.$row->product->model_name;
            })
            ->addColumn('body_price_uzs', function($row){
                return number_format($row->body_price_uzs, 0, '.', ' ');
            })
            ->addColumn('body_price_usd', function($row){
                return '$ '.number_format($row->body_price_usd, 0, '.', ' ');
            })
            ->addColumn('sales_price', function($row){
                return number_format($row->sales_price, 0, '.', ' ');
            })
            ->addColumn('user', function($row){
                return $row->user->name;
            })
            ->rawColumns(['product_name','branch_name', 'user'])
            ->make(true);

    }
    public function pay_list_report(Request $request)
    {
        if($request->ajax())
        {
            return $data = $this->payListRepository->pay_list_report($request);

        }






    }
}
