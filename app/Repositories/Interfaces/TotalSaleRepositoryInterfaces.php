<?php
namespace App\Repositories\Interfaces;

interface TotalSaleRepositoryInterfaces
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
    public function last($invoice);

}
