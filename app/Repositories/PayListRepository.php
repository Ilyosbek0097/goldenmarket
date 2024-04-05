<?php
namespace App\Repositories;

use App\Models\PayList;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;

class PayListRepository implements PayListRepositoryInterfaces
{
    protected  PayList $payList;
    public function __construct(PayList $payList)
    {
        $this->payList = $payList;
    }

    public function all()
    {
        if (auth()->user()->role == 'user')
        {
            return $this->payList->where('branch_id', auth()->user()->branch_id)->orderBy('id', 'DESC')->get();
        }
        else{
            return $this->payList->where('in_out_status', 1)->orderBy('id', 'DESC')->get();
        }

    }

    public function get($id)
    {
       return $this->payList->findOrFail($id);
    }

    public function store($data)
    {
       return $this->payList->create($data);
    }

    public function update($data, $id)
    {
       return $this->payList->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->payList->destroy($id);
    }
    public function payTotal($status, $tip, $check_status)
    {
        return $this->payList
            ->where('in_out_status', $status)
            ->where('check_status', $check_status)
            ->where('pay_type', $tip)
            ->where('branch_id', auth()->user()->branch_id)
            ->sum('pay_sum');
    }


    public function payReportTotal($status, $tip, $check_status, $one_date = '', $two_date = '')
    {
        $query = $this->payList
            ->where('in_out_status', $status)
            ->where('check_status', $check_status)
            ->where('pay_type', $tip)
            ->where('branch_id', auth()->user()->branch_id);


            if ($one_date != '') {
                $query->whereBetween('date', [$one_date, $two_date]);
            }

        return $query->sum('pay_sum');
    }
    public function payReportTotalOutput($status, $tip, $check_status, $output_type_id = '', $one_date = '', $two_date = '')
    {
        $query = $this->payList
            ->where('in_out_status', $status)
            ->where('check_status', $check_status)
            ->where('pay_type', $tip)
            ->where('branch_id', auth()->user()->branch_id);

        if($output_type_id != '' )
        {
            $query->where('output_type_id', $output_type_id);
        }
        else {
            $query->whereNotIn('output_type_id', [1,2]);
        }
        if ($one_date != '') {
            $query->whereBetween('date', [$one_date, $two_date]);
        }

        return $query->sum('pay_sum');
    }

    public function pay_list_report($data)
    {
        $jamiNaqdKassa = $this->payReportTotal(0, 'naqd', 1, $data->one_date, $data->two_date);
        $jamiPlastikKassa = $this->payReportTotal(0, 'plastik', 1, $data->one_date, $data->two_date);

        $InkassaPlastik = $this->payReportTotalOutput(1,'plastik',1, 2, $data->one_date, $data->two_date);
        $InkassaNaqd = $this->payReportTotalOutput(1,'naqd',1, 1, $data->one_date, $data->two_date);

        $chiqimPlastik = $this->payReportTotalOutput(1, 'plastik', 1, $data->one_date, $data->two_date);
        $chiqimNaqd = $this->payReportTotalOutput(1, 'naqd', 1, $data->one_date, $data->two_date);

        $loadInkassaNaqd = $this->payReportTotalOutput(1,'naqd', 0,1,$data->one_date, $data->two_date);
        $loadInkassaPlastik = $this->payReportTotalOutput(1,'plastik', 0,2,$data->one_date, $data->two_date);

        $naqd_kassa = $jamiNaqdKassa-$InkassaNaqd-$chiqimNaqd;
        $plastik_kassa = $jamiPlastikKassa-$InkassaPlastik-$chiqimPlastik;

        return json_encode([
            'naqd_kirim' => number_format($jamiNaqdKassa, 0, '.', ' '),
            'plastik_kirim' => number_format($jamiPlastikKassa, 0, '.', ' '),
            'plastik_inkassa' => number_format($InkassaPlastik, 0, '.', ' '),
            'naqd_inkassa' => number_format($InkassaNaqd, 0, '.', ' '),
            'naqd_chiqim' => number_format($chiqimNaqd, 0, '.', ' '),
            'plastik_chiqim' => number_format($chiqimPlastik, 0, '.', ' '),
            'kassa_naqd' => number_format($naqd_kassa, 0, '.', ' '),
            'kassa_plastik' => number_format($plastik_kassa, 0, '.', ' '),
            'load_naqd' => number_format($loadInkassaNaqd, 0, '.', ' '),
            'load_plastik' => number_format($loadInkassaPlastik, 0, '.', ' '),
        ]);
    }

}
