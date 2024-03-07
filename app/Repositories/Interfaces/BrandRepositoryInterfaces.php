<?php
namespace App\Repositories\Interfaces;

interface BrandRepositoryInterfaces
{
    public function all();

    public function get($id);

    public function store($data);

    public function update($data, $id);

    public function delete($id);
}
