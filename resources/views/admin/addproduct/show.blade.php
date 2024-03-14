@extends('layouts.mydashboard')
@section('title', 'Add Product Show')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                                        <h5 class="card-header">Qo'shilgan Tovar Ma'lumoti</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5">
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <th>Kiritilgan Sana</th>
                                                        <td>{{ \Carbon\Carbon::parse($addproduct->register_date)->format('d-M-Y')  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contragent</th>
                                                        <td>{{ $addproduct->supplier->full_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Filiali</th>
                                                        <td class="text-danger">{{ $addproduct->branch->name  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Invoice Raqami</th>
                                                        <td><span class="badge bg-label-dark"> № {{ $addproduct->invoice_order }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Maxsulot Raqami</th>
                                                        <td>{{ $addproduct->productname->type->type_name }} {{ $addproduct->productname->brand->brand_name}} {{ $addproduct->productname->model_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Miqdori</th>
                                                        <td>{{ $addproduct->amount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kirim UZS</th>
                                                        <td>{{  number_format($addproduct->body_price_uzs, 0 , '.', ' ') }} UZS</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kirim $</th>
                                                        <td>$ {{ $addproduct->body_price_usd }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Natsenkasi</th>
                                                        <td>{{ $addproduct->mark->value }} %</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sotish Narxi</th>
                                                        <td> {{ number_format($addproduct->sales_price, 0 , '.', ' ') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kiritgan Xodim</th>
                                                        <td>{{ $addproduct->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Statusi</th>
                                                        <td>@if($addproduct->check_status == 0) <span class="badge  bg-label-warning"><i class="bx bx-alarm"></i> </span>@elseif($addproduct->check_status == 2) <span class="badge  bg-label-danger"><i class="bx bx-x-circle"></i> </span> @else <span class="badge  bg-label-success"><i class="bx bx-check-circle"></i></span @endif</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
