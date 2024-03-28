<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayListStoreRequest;
use App\Models\PayList;
use App\Repositories\Interfaces\OutputTypeRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayListController extends Controller
{

    public function __construct(
        protected PayListRepositoryInterfaces $payListRepository,
        protected OutputTypeRepositoryInterfaces $outputTypeRepository,
        )
    {


    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payListAll = $this->payListRepository->all();
        return view('user.paylist.index', compact('payListAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $incomePayAllCash = $this->payListRepository->payTotal(0, 'naqd');
        $incomePayAllPlastic = $this->payListRepository->payTotal(0, 'plastik');
        $outputPayAllCash = $this->payListRepository->payTotal(1, 'naqd');
        $outputPayAllPlastic = $this->payListRepository->payTotal(1, 'plastik');

        $outputTypeAll = $this->outputTypeRepository->all();

        $outputPayAll = $this->payListRepository->all();
        return view('user.paylist.create', compact('outputPayAll','incomePayAllCash', 'incomePayAllPlastic', 'outputPayAllCash', 'outputPayAllPlastic', 'outputTypeAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PayListStoreRequest $request)
    {
//        return $request;
        return $this->execute(function () use ($request){
            $data = [];
            $data = [
                'total_sale_id' => 0,
                'date' => date('Y-m-d'),
                'pay_sum' => $request->pay_sum,
                'pay_type' => $request->pay_type,
                'in_out_status' => 1,
                'check_status' => 1,
                'insert_user_id' => auth()->id(),
                'branch_id' => auth()->user()->branch_id,
                'output_type_id' => $request->output_type_id,
                'comment' => $request->comment,
            ];
           $this->payListRepository->store($data);
           return redirect()->back()->with('success', "Ma'lumotlar Kiritildi!");
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(PayList $payList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayList $payList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PayList $payList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayList $payList)
    {
        //
    }

    protected function execute(callable $callback)
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
            return redirect()->back()->with('error', "Xatolik Sodir Bo'ldi!")->withErrors($e->getMessage());
        }
    }
}
