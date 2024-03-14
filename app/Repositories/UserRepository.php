<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;

class UserRepository implements UserRepositoryInterfaces
{

    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
        // TODO: Implement store() method.
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
