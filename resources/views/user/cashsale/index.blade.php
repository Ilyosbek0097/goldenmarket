@extends('layouts.mydashboard')
@section('title', 'Product Sales')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ route('cashsales.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                                        <h5 class="card-header">Sotilgan Maxsulotlar</h5>
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
                                            <table class="table datatable" style="font-size: 12px;">
                                                <thead class="table-light" >
                                                <tr>
                                                    <th>№</th>
                                                    <th>Invoice Raqami</th>
                                                    <th>Jami Savdo UZS</th>
                                                    <th>Chegirma %</th>
                                                    <th>Chegirma Qiymati UZS</th>
                                                    <th>Sotilgan Narx UZS</th>
                                                    <th>Sotuvchi</th>
                                                    <th>Filiali</th>
                                                    <th>Kim Tomonidan Kelgan</th>
                                                    <th>Mijoz</th>
                                                    <th>Amallar</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0 text-center">
                                                    @foreach($totalSaleAll as $totalSale)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="{{ route('cashsales.show', $totalSale->sales_order) }}" class="badge bg-primary">№ {{ $totalSale->sales_order }}</a></td>
                                                            <td>{{ number_format($totalSale->total_sales, 0, '.', ' ') }} </td>
                                                            <td>{{ $totalSale->discount }}</td>
                                                            <td>{{ number_format($totalSale->total_sales * ($totalSale->discount/100), 0, '.', ' ') }}</td>
                                                            <td>{{ number_format($totalSale->final_sales, 0, '.', ' ' ) }}</td>
                                                            <td>{{ $totalSale->user->name }}</td>
                                                            <td>{{ $totalSale->branch->name }}</td>
                                                            <td>{{ $totalSale->user->name ?? '' }}</td>
                                                            <td>{{ $totalSale->client ? $totalSale->client->full_name : '' }}</td>
                                                            <td>{{ $totalSale->canceled ?? '' }}</td>
                                                        </tr>
                                                    @endforeach
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

