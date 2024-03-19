@extends('layouts.mydashboard')
@section('title', 'Brand Show')
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
                                        <h5 class="card-header">Brend Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5">
                                                <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <th class="text-dark">Tur Nomi</th>
                                                    <td>{{ $brandOne->getType($brandOne->type_id)->type_name }}</td>
                                                </tr>
                                                    <tr>
                                                        <th class="text-dark">Brend Nomi</th>
                                                        <td>{{ $brandOne->brand_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Kiritilgan Vaqti</th>
                                                        <td>{{ $brandOne->created_at }}</td>
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
