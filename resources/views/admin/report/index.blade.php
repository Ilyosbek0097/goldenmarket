@extends('layouts.mydashboard')
@section('title', 'Admin Report')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <h5 class="card-header">Brandlar Ro'yxati</h5>
                                    <div class="table-responsive text-nowrap">
                                        <div class="offset-md-1 col-md-10">
                                            @if($message = session()->get('success'))
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                            @if($message = session()->get('error'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                        </div>
                                            <form method="POST">
                                                <div class="row m-1">
                                                    <div class="col-sm-3">
                                                        <label class="form-label-sm" for="from_date">Sanadan</label>
                                                        <input type="date" id="from_date" name="from_date" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-label-sm" for="to_date">Sanagacha</label>
                                                        <input type="date" id="to_date" name="to_date" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <button class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="confirm"> <i class="bx bxs-filter-alt"></i> </button>
                                                        <button class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="reset"> <i class="bx bx-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <table class="table">
                                            <thead class="table-light ">
                                            <tr>
                                                <th>№</th>
                                                <th>Tipi</th>
                                                <th>Brendi</th>
                                                <th>Amallar</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">

                                            </tbody>
                                        </table>
                                        <div class="pagination justify-content-end mt-3 mb-3">
                                        </div>
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
@section('script')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection

