<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected UserRepositoryInterfaces $userRepository;
    protected BranchRepositoryInterfaces $branchRepository;
    public function __construct(
            UserRepositoryInterfaces $userRepository,
            BranchRepositoryInterfaces $branchRepository,
         )
    {
        $this->userRepository = $userRepository;
        $this->branchRepository = $branchRepository;
    }

    public function index()
    {
        $userAll = $this->userRepository->all();

        return view('admin.user.index', compact('userAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branchAll = $this->branchRepository->all();
        return view('admin.user.create', compact('branchAll'));
    }


    public function store(UserStoreRequest $request)
    {
        return $this->except(function () use ($request){
           $this->userRepository->store($request);
           return redirect()->route('users.index')->with('success', "Ma'lumot Bazaga Kiritildi!");
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userRepository->get($id);
        $branchAll = $this->branchRepository->all();
        return view('admin.user.edit', compact('user', 'branchAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function except(callable $callback)
    {
        DB::beginTransaction();
        try{
            $result = $callback();
            DB::commit();
            return $result;
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
