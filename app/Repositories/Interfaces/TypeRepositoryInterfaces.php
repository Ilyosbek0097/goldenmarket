<?php
namespace App\Repositories\Interfaces;

interface TypeRepositoryInterfaces {

    public function all();

    public function get($id);

    public function store(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
