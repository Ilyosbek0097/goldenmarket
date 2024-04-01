<?php
namespace App\Repositories\Interfaces;

interface AdminPayListRepositoryInterfaces
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
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * @param $in_out_status
     * @param $tip
     * @param $check_status
     * @return mixed
     */
    public function payTotal($in_out_status, $tip, $check_status);

    /**
     * @param $data
     * @return mixed
     */
    public function outputstore($data);

}
