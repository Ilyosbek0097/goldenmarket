<?php
namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterfaces;

class ClientRepository implements ClientRepositoryInterfaces
{
    protected Client $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function store($data)
    {
       return $this->client->create($data);
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function last($user_id)
    {
        return $this->client->where('user_id', $user_id)->latest()->first();
    }
}
