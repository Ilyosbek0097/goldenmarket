<?php
namespace App\Repositories\Interfaces;

interface PayListRepositoryInterfaces
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

    /**
     * @param $status
     * @param $tip
     * @return mixed
     */
    public function payTotal($status, $tip, $check_status);

    /**
     * @param $data
     * @return mixed
     */
    public function pay_list_report($data);
}
