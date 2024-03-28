@extends('layouts.mydashboard')
@section('title', 'PayList')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ route('paylists.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                                        <h5 class="card-header">Kassa</h5>
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
                                            <div class="row">
                                                <div class="offset-md-1 col-md-10">
                                                    <table class="table-striped datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>№</th>
                                                                <th>Sana</th>
                                                                <th>Summa Turi</th>
                                                                <th>Summa</th>
                                                                <th>Holati</th>
                                                                <th>Izoxi</th>
                                                                <th>Amal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($payListAll as $pay)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $pay->date }}</td>
                                                                    <td> <span class="badge bg-{{ $pay->pay_type == 'naqd' ? 'success' : 'warning'  }}"> {{ $pay->pay_type }}</span></td>
                                                                    <td>{{ number_format($pay->pay_sum, 0, '.', ' ') }}</td>
                                                                    <td><span class="badge rounded-pill bg-{{ $pay->in_out_status == 1 ? 'danger' : 'primary' }}">{{ $pay->in_out_status == 1 ? 'Chiqim' : 'Kirim' }}</span> </td>
                                                                    <td>{{ $pay->comment}}</td>
                                                                    <td>{{ $pay->check_status}}</td>
                                                                </tr>
                                                            @endforeach
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
        </div>
    </div>
    <div class="mt-3">
        <div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="confirmForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">Eslatma!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Siz rostdan ham ushbu elementni o'chirasizmi!</p>
                        <input type="hidden" id="branchId" name="id" >
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="submit_remove">Tasdiqlash</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Bekor Qilish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.btnDelete').on('click', function (e){
                e.preventDefault();
                elemtID = $(this).data('id');
                // $("#branchId").val(elemtID);
               $("#confirmForm").attr('action', 'brands/'+elemtID);
            })
        });
    </script>
@endsection

