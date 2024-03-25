<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterfaces
{

    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        if(auth()->user()->role == 'user')
        {
            return $this->user->where('role', 'user')->get();
        }
        else{
            return $this->user->all();
        }
    }

    public function get($id)
    {
        return $this->user->findOrFail($id);
    }

    public function store($data)
    {
        return $this->user->create([
            'name' => $data->name,
            'email' => $data->email,
            'role' => $data->role,
            'branch_id' => $data->branch_id,
            'password' => Hash::make($data->password)
        ]);
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
