@extends('layouts.mydashboard')
@section('title', 'Branch Show')
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
                                        <h5 class="card-header">Filial Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <th>Nomi</th>
                                                        <td>{{ $branchOne->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Manzili</th>
                                                        <td>
                                                            {{\Illuminate\Support\Str::limit($branchOne->address, 100)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telefon Raqami</th>
                                                        <td>
                                                            {{ $branchOne->phone }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Surati</th>
                                                        <td>
                                                            <img src="/site/images/{{ $branchOne->image}}" class="img-thumbnail" width="200">
                                                        </td>
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
