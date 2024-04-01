@extends('layouts.mydashboard')
@section('title', 'Admin PayList')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ route('adminpaylists.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>
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
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table-striped table-bordered datatable" style="font-size: 12px">
                                                            <thead>
                                                            <tr>
                                                                <th>№</th>
                                                                <th>Sana</th>
                                                                <th>Summa Turi</th>
                                                                <th>Summa</th>
                                                                <th>Turi</th>
                                                                <th>Chiqim Sababi</th>
                                                                <th>Izoxi</th>
                                                                <th class="text-center">Amal</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($payListAll as $pay)
                                                                @if($pay->outputtype->check_status == 1  || $pay->outputtype->check_status == 2)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $pay->date }}</td>
                                                                        <td> <span class="badge bg-{{ $pay->pay_type == 'naqd' ? 'success' : 'warning'  }}"> {{ $pay->pay_type }}</span></td>
                                                                        <td>{{ number_format($pay->pay_sum, 0, '.', ' ') }}</td>
                                                                        <td><span class="badge bg-label-{{ $pay->in_out_status == 1 ? 'success' : 'danger' }}">{{ $pay->in_out_status == 1 ? 'Kirim' : '' }}</span> </td>
                                                                        <td>{{ $pay->outputtype ? $pay->outputtype->name : 'Kirim Qilindi' }}</td>
                                                                        <td>{{ $pay->comment}}</td>
                                                                        <td class="text-center">
                                                                            @if($pay->check_status == 0)
                                                                                <button data-id="{{ $pay->id }}" type="button" class="btn btn-outline-warning btn-sm bg-light btn-icon text-white btnConfirm">
                                                                                    <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>
                                                                                </button>
                                                                            @elseif($pay->check_status == 1)
                                                                                <span class="badge bg-label-success"><i class="bx bx-check-circle"></i></span>
                                                                            @else
                                                                                <span class="badge bg-label-danger"><i class="bx bx-x-circle"></i></span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
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
    </div>
    <div class="d-none">
        <form action="{{ route('adminpaylists.store') }}" method="POST" id="addPayForm">
            @csrf
            <input type="hidden" id="check_status" name="check_status">
            <input type="hidden" id="pay_id" name="pay_list_id">
        </form>
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
            });

            $(document).on("click", ".btnConfirm", function(){
                var pay_id = $(this).data('id');

                Swal.fire({
                    title: "Diqqat!",
                    text: "Ushbu Pul Mablag'ini Bazaga Qabul Qilasizmi?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Tasdiqlash",
                    denyButtonText: "O'chirish",
                    cancelButtonText: "Chiqish",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $("#check_status").val(1);
                        $("#pay_id").val(pay_id);
                        $("#addPayForm").submit();
                        Swal.fire({
                            title: "Qabul Qilishga Jo'natildi!",
                            text: "Biroz Kuting!.",
                            icon: "success"
                        });
                    } else if (result.isDenied) {
                        $("#check_status").val(2);
                        $("#pay_id").val(pay_id);
                        $("#addPayForm").submit();
                        Swal.fire({
                            title: "O'chirish",
                            text: "O'chirish Amalga Oshirildi",
                            icon: "warning"
                        });
                    }
                    else{
                        $("#check_status").val('');
                        $("#pay_id").val('');
                    }
                });

            });
        });
    </script>
@endsection

