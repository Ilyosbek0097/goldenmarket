@extends('layouts.mydashboard')
@section('title', 'Add Product')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-end">
                                <a href="{{ route('addproducts.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <h5 class="card-header">Qo'shilgan Maxsulotlar Ro'yxati</h5>
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
                                        <table class="table datatable">
                                            <thead class="table-light">
                                            <tr>
                                                <th>№</th>
                                                <th>Kiritilgan Sana</th>
                                                <th>Contragent</th>
                                                <th>Filiali</th>
                                                <th>Invoice Raqami</th>
                                                <th>Maxsulot Nomi</th>
                                                <th>Miqdori</th>
                                                <th>Kirim UZS</th>
                                                <th>Kirim $</th>
                                                <th>Natsenkasi</th>
                                                <th>Sotish Narxi</th>
                                                <th>Kiritgan Xodim</th>
                                                <th>Status</th>
                                                <th>Amallar</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0 text-center">
                                                @foreach($addProductAll as $index => $addproduct)
                                                    <tr>
                                                        <td>{{$index + $addProductAll->firstItem()}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($addproduct->register_date)->format('d-M-Y')  }}</td>
                                                        <td>{{ $addproduct->supplier->full_name }}</td>
                                                        <td>{{ $addproduct->branch->name }}</td>
                                                        <td> <span class="text-success">{{ $addproduct->invoice_order }}</span></td>
                                                        <td>{{ $addproduct->productname->type->type_name }} {{$addproduct->productname->brand->brand_name}} {{ $addproduct->productname->model_name  }}</td>
                                                        <td>{{ $addproduct->amount }}</td>
                                                        <td>{{ number_format($addproduct->body_price_uzs, 2, '.', ' ') }}</td>
                                                        <td>$ {{ $addproduct->body_price_usd }}</td>
                                                        <td>{{ number_format($addproduct->mark->value, 2, '.', ' ') }} %</td>
                                                        <td>{{ number_format($addproduct->sales_price, 2, '.', ' ') }} UZS</td>
                                                        <td>{{ $addproduct->user->name }}</td>
                                                        <td>@if($addproduct->check_status == 0) <span class="badge  bg-label-danger"><i class="bx bx-x-circle"></i> </span>@else <span class="badge  bg-label-success"><i class="bx bx-check-circle"></i></span @endif</td>

                                                        <td>
                                                            <a class="btn btn-success btn-sm" href="{{ route('addproducts.show',$addproduct->id ) }}"><i class="bx bx-show me-1"></i> Ko'rish</a>
                                                            <a class="btn btn-info btn-sm" href=" {{ route('addproducts.edit', $addproduct->id) }}"><i class="bx bx-edit-alt me-1"></i> Tahrirlash</a>
                                                            <button data-id="{{ $addproduct->id }}" type="button" class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#modalTop" ><i class="bx bx-trash me-1"></i> O'chirish</button>
                                                        </td>

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
               $("#confirmForm").attr('action', 'types/'+elemtID);
            })
        });
    </script>
@endsection

