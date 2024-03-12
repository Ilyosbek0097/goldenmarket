<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkStoreRequest;
use App\Http\Requests\MarkUpdateRequest;
use App\Models\Mark;
use App\Repositories\Interfaces\MarkRepositoryInterfaces;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    protected MarkRepositoryInterfaces $markRepository;
    public function __construct(MarkRepositoryInterfaces $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $markAll = $this->markRepository->all();
        return view('admin.mark.index', compact('markAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mark.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param MarkStoreRequest $request
     * @return RedirectResponse
     */
    public function store(MarkStoreRequest $request)
    {
        return $this->execute( function() use ($request){
           $this->markRepository->store($request);
           return redirect()->route('marks.index')->with('success', "Ma'lumotlar Bazaga Kiritildi!");
        });
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $markOne = $this->markRepository->get($id);
        return view('admin.mark.show', compact('markOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        $markOne = $this->markRepository->get($id);
//        return view('admin.mark.edit', compact('markOne'));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarkUpdateRequest $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        return redirect()->back();
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
