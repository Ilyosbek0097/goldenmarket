<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPayListOutputstoreRequest;
use App\Http\Requests\AdminPayListStoreRequest;
use App\Http\Requests\AdminPayListUpdateRequest;
use App\Models\AdminPayList;
use App\Repositories\Interfaces\AdminPayListRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPayListController extends Controller
{
    public function __construct(
            protected AdminPayListRepositoryInterfaces $adminPayListRepository,
            protected PayListRepositoryInterfaces $payListRepository,
            protected SupplierRepositoryInterfaces $supplierRepository,
        )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payListAll = $this->payListRepository->all();
        return view('admin.adminpaylist.index', compact('payListAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplierAll = $this->supplierRepository->all();

        $incomePayAllCash = $this->adminPayListRepository->payTotal(0, 'naqd',1);
        $incomePayAllPlastic = $this->adminPayListRepository->payTotal(0, 'plastik',1);
        $outputPayAllCash = $this->adminPayListRepository->payTotal(1, 'naqd',1);
        $outputPayAllPlastic = $this->adminPayListRepository->payTotal(1, 'plastik',1);

        $adminPayListAll = $this->adminPayListRepository->all();
        return view('admin.adminpaylist.create', compact(
            'supplierAll', 'incomePayAllCash', 'incomePayAllPlastic', 'outputPayAllCash', 'outputPayAllPlastic', 'adminPayListAll'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPayListStoreRequest $request)
    {
//        return  $request;
        return $this->execute(function () use ($request){
                $dataPayListUpdate = [];
                $dataPayListUpdate = [
                    'check_status' => $request->check_status,
                    'update_user_id' => auth()->id()
                ];
                $this->payListRepository->update($dataPayListUpdate, $request->pay_list_id);
                if($request->check_status == 1)
                {
                    $paylistOne = $this->payListRepository->get($request->pay_list_id);
                    $dataAdminPayList = [];
                    $branchName = '';
                    if($request->pay_list_id != 0)
                    {
                        $branchName =  $paylistOne->branch->name. " Filialidan Kirim Qilindi!";
                    }

                    $dataAdminPayList = [
                        'date' => date('Y-m-d'),
                        'pay_sum' => $paylistOne->pay_sum,
                        'pay_type' => $paylistOne->pay_type,
                        'in_out_status' => '0',
                        'check_status' => '1',
                        'comment' => $branchName,
                        'user_id' => auth()->id(),
                        'branch_id' => $paylistOne->branch_id
                    ];

                    $this->adminPayListRepository->store($dataAdminPayList);

                    return redirect()->back()->with('success' , "Ma'lumotlar Bazaga Kirtildi");
                }
                else{
                    return redirect()->back()->with('error' , "Jo'natilgan Mablag' Bekoq Qilindi!");
                }
        });
    }
    public function outputstore(AdminPayListOutputstoreRequest $request)
    {
        return $this->execute(function() use ($request){
            $data = [];
            $data = [
                'date' => date('Y-m-d'),
                'pay_sum' => $request->pay_sum,
                'pay_type' => $request->pay_type,
                'in_out_status' => '1',
                'check_status' => '1',
                'comment' => $request->comment,
                'user_id' => auth()->id(),
                'branch_id' => '0',
                'supplier_id' => $request->output_type_id,
            ];
            $this->adminPayListRepository->outputstore($data);

            return redirect()->back()->with('success', "Malumotlar Bazaga Kiritildi!");
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(AdminPayList $adminPayList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminPayList $adminPayList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminPayList $adminPayList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->execute(function() use ($id) {
           $this->adminPayListRepository->delete($id);
           return redirect()->back()->with('success', "Ma'lumot O'chirildi!");
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
        catch(\Exception $e){
            DB::rollBack();
            return  redirect()->back()->with('error', $e->getMessage());
        }
    }
}
