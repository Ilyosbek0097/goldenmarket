<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyStoreRequest;
use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    protected CurrencyRepositoryInterfaces $currencyRepository;
    public function __construct( CurrencyRepositoryInterfaces $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencyAll = $this->currencyRepository->all();
        $lastItem = $currencyAll->last();
        if($lastItem)
        {
            Session::put('dollar_kursi', round($lastItem->uzs/$lastItem->usd));
        }

        return view('admin.currency.index', compact('currencyAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyStoreRequest $request)
    {
//        return $request;
        return $this->execute(function() use ($request) {
           $this->currencyRepository->store($request);
           return redirect()->route('currencys.index')->with('success',"Ma'lumotlar Bazaga Muvaffaqiyatli Kiritildi! Dollar Kursi O'zgartirildi!");
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->execute(function() use ($id){
           $this->currencyRepository->delete($id);
           return redirect()->route('currencys.index')->with('success', "Ma'lumot Muvaffaqiyatli O'chirildi!");
        });

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
            return redirect()->back()->with('error', "Xatolik Sodir Bo'ldi")->withErrors($e->getMessage());

        }
    }
}
