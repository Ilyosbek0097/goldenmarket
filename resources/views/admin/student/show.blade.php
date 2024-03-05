@extends('layouts.mydashboard')
@section('title', 'Student Show')
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
                                        <h5 class="card-header">O'qituvchi Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <th>Ismi</th>
                                                        <td>{{ $studentOne->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Familyasi</th>
                                                        <td>
                                                            {{ $studentOne->last_name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tug'ilgan Sanasi</th>
                                                        <td>
                                                            {{ date('d-m-Y',strtotime($studentOne->date_of_birth) ) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ID raqami</th>
                                                        <td>
                                                           <span class="badge rounded-pill bg-danger">{{ $studentOne->student_code }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Filiali</th>
                                                        <td>
                                                            {{ $studentOne->getBranch($studentOne->branch_id)->name ?? '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telefon Raqami</th>
                                                        <td>
                                                            {{ $studentOne->phone }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Surati</th>
                                                        <td>
                                                            <img src="/site/images/{{ $studentOne->image}}" class="img-thumbnail" width="200">
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
