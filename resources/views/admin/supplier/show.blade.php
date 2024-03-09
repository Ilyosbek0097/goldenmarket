@extends('layouts.mydashboard')
@section('title', 'Supplier Show')
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
                                        <h5 class="card-header">Contragent Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5">
                                                <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <th class="text-dark">To'liq Ismi</th>
                                                    <td>{{ $supplierOne->full_name }}</td>
                                                </tr>
                                                    <tr>
                                                        <th class="text-dark">Manzili</th>
                                                        <td>{{ $supplierOne->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Telefon Raqamlari</th>
                                                        <td>{{ $supplierOne->phone1 }} , {{$supplierOne->phone2 ?? ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Contragent Kodi</th>
                                                        <td>{{ $supplierOne->code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Kim Kiritgan</th>
                                                        <td>{{ $supplierOne->getUser($supplierOne->user_id)->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-dark">Kiritilgan Vaqti</th>
                                                        <td>{{ $supplierOne->created_at }}</td>
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
