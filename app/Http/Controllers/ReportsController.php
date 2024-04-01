<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use App\Repositories\Interfaces\ReportsRepositoryInterfaces;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
//use Excel;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    public function __construct(
            protected WarehouseRepositoryInterfaces $warehouseRepository,
            protected AddProductRepositoryInterfaces $addProductRepository,
            protected ReportsRepositoryInterfaces $reportsRepository,
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
//        return Excel::download($data, $file_name);

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
//        ->whereBetween('register_date', [$request->first_date, $request->last_date])
        //$this->productname->type->type_name.' '.$this->productname->branch->brand_name.' '.

    }
}
