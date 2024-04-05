<?php
namespace App\Repositories\Interfaces;

interface ReportsRepositoryInterfaces
{
    /**
     * @return mixed
     */
    public function export_add_product();

    /**
     * @param $data
     * @return mixed
     */
    public function add_product_report($data);

    /**
     * @param $data
     * @return mixed
     */
    public function cash_sales_repository($data);
}
