<?php
namespace App\Repositories\Interfaces;

interface AddProductRepositoryInterfaces
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
