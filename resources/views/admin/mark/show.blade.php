@extends('layouts.mydashboard')
@section('title', 'Mark Show')
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
                                        <h5 class="card-header">Natsenka Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5">
                                                <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <th class="text-dark">Natsenka Nomi</th>
                                                    <td>{{ $markOne->mark_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-dark">Natsenka Tipi</th>
                                                    <td>{{ $markOne->type }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-dark">Natsenka Qiymati</th>
                                                    <td>{{ $markOne->value }}</td>
                                                </tr>
                                                    <tr>
                                                        <th class="text-dark">Kiritilgan Vaqti</th>
                                                        <td>{{ $markOne->created_at }}</td>
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
