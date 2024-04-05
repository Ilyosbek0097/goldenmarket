<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function __construct(
        CashSalesRepositoryInterfaces  $cashSaleRepository,
        )
    {

    }

    public function index()
    {
        $cashSaleAll = $this->cashSaleRepository->all();
        return view('admin.report.index');
    }
}
