@extends('layouts.mydashboard')
@section('title', 'Product Name Show')
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
                                        <h5 class="card-header">Maxsulot To'liq Nomi Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5">
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <th class="text-dark">Tur Nomi</th>
                                                        <td> {{ $productname->type($productname->type_id)->type_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Brend Nomi</th>
                                                        <td>{{ $productname->brand($productname->brand_id)->brand_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Modeli</th>
                                                        <td>{{ $productname->model_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Eski Kodi</th>
                                                        <td>{{ $productname->old_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Barcode</th>
                                                        <td class="text-danger"> {{ $productname->barcode }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Kiritilgan Vaqti</th>
                                                        <td>{{ $productname->created_at }}</td>
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
