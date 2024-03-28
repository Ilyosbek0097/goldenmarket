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
        $incomePayAllCash = $this->payListRepository->payTotal(0, 'naqd',1);
        $incomePayAllPlastic = $this->payListRepository->payTotal(0, 'plastik',1);
        $outputPayAllCash = $this->payListRepository->payTotal(1, 'naqd',1);
        $outputPayAllPlastic = $this->payListRepository->payTotal(1, 'plastik',1);

        $warningOutputCash =  $this->payListRepository->payTotal(1, 'naqd',0);
        $warningOutputPlastic =  $this->payListRepository->payTotal(1, 'plastik',0);

        $outputTypeAll = $this->outputTypeRepository->all();

        $outputPayAll = $this->payListRepository->all();
        return view('user.paylist.create', compact('warningOutputPlastic','warningOutputCash','outputPayAll','incomePayAllCash', 'incomePayAllPlastic', 'outputPayAllCash', 'outputPayAllPlastic', 'outputTypeAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PayListStoreRequest $request)
    {
//        return $request;
        $outputtypeOne = $this->outputTypeRepository->get($request->output_type_id);
        $check_status = 1;
        $pay_type = $request->pay_type;
        if($outputtypeOne->check_status == 1 || $outputtypeOne->check_status == 2)
        {
            $check_status = 0;
            if($outputtypeOne->check_status == 1){
                $pay_type = 'naqd';
            }
            elseif($outputtypeOne->check_status == 2)
            {
                $pay_type = 'plastik';
            }
            else
            {
                $pay_type = $request->pay_type;
            }

        }
        else{
            $check_status = 1;
            $pay_type = $request->pay_type;
        }
        return $this->execute(function () use ($pay_type, $check_status, $request){
            $data = [];
            $data = [
                'total_sale_id' => 0,
                'date' => date('Y-m-d'),
                'pay_sum' => $request->pay_sum,
                'pay_type' => $pay_type,
                'in_out_status' => 1,
                'check_status' => $check_status,
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       return $this->execute(function() use ($id){
         $this->payListRepository->delete($id);
         return redirect()->back()->with('success', "Ma'lumotlar O'chirildi!");
       });
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
            return redirect()->back()->with('error', $e->getMessage())->withErrors($e->getMessage());
        }
    }
}
