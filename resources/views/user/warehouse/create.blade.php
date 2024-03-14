@extends('layouts.mydashboard')
@section('title', 'Add Product Create')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 text-end mt-3 mr-2">
                        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Maxsulotlar Qo'shish</h5>
                    </div>
                    <div class="card-body">
                        @error('addproduct_id')
                        <div class="mt-2 text-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <form action="{{ route('warehouses.store') }}" method="POST" id="addProductForm">
                            @csrf
                            <table class="table-striped datatable table-sm" style="font-size: 12px">
                                <thead class="table-light ">
                                    <tr>
                                        <th>№</th>
                                        <th>Qo'shish</th>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($addProductAll as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($product->check_status == 0)
                                                    <button data-id="{{ $product->id }}" type="button" class="btn btn-outline-warning btn-sm bg-light btn-icon text-white btnConfirm">
                                                        <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>

                                                    </button>
                                                @elseif($product->check_status == 1)
                                                    <span class="badge bg-label-success" ><i class="bx bx-check-circle"></i></span>
                                                @else
                                                    <span class="badge bg-label-danger" ><i class="bx bx-x-circle"></i></span>
                                                @endif
                                            </td>
                                            <td>{{ \Illuminate\Support\Carbon::parse($product->register_date)->format('d-M-Y') }}</td>
                                            <td>{{ $product->supplier->full_name }}</td>
                                            <td>{{ $product->branch->name}}</td>
                                            <td>
                                                <span class="badge bg-primary">№ {{ $product->invoice_order }}</span>
                                            </td>
                                            <td>
                                                {{ $product->productname->type->type_name }} {{ $product->productname->brand->brand_name }} {{ $product->productname->model_name }}
                                            </td>
                                            <td>
                                                {{ $product->amount }}
                                            </td>
                                            <td>
                                                {{ number_format($product->body_price_uzs , 0, '.', ' ') }}
                                            </td>
                                            <td>
                                                {{ number_format($product->body_price_usd , 2, '.', ' ') }}
                                            </td>
                                            <td>
                                                {{ $product->mark->value }} %
                                            </td>
                                            <td>
                                                {{ number_format($product->sales_price , 2, '.', ' ') }}
                                            </td>
                                            <td>
                                                {{ $product->user->name }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <input type="hidden" id="addproduct_id" name="addproduct_id">
                            <input type="hidden" id="check_status" name="check_status">
                            <button type="submit" id="btnSubmit" class="btn btn-primary">Saqlash</button>
                            <button type="reset" class="btn btn-danger">Bekor Qilish</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
       $(document).on("click", ".btnConfirm", function(){
          var productId = $(this).data('id');

               Swal.fire({
                   title: "Diqqat!",
                   text: 'Tovarni Bazaga Qabul Qilasizmi?',
                   showDenyButton: true,
                   showCancelButton: true,
                   confirmButtonText: "Tasdiqlash",
                   denyButtonText: "O'chirish",
                   cancelButtonText: "Chiqish",
               }).then((result) => {
                   /* Read more about isConfirmed, isDenied below */
                   if (result.isConfirmed) {
                       $("#addproduct_id").val(productId);
                       $("#check_status").val(1);
                       $("#addProductForm").submit();
                       Swal.fire({
                           title: "Qabul Qilishga Jo'natildi!",
                           text: "Biroz Kuting!.",
                           icon: "success"
                       });
                   } else if (result.isDenied) {
                       $("#addproduct_id").val(productId);
                       $("#check_status").val(2);
                       $("#addProductForm").submit();
                       Swal.fire({
                           title: "O'chirish",
                           text: "O'chirish Amalga Oshirildi",
                           icon: "warning"
                       });
                   }
                   else{
                       $("#addproduct_id").val('');
                       $("#check_status").val('');
                   }
               });

       });
    });
</script>
@endsection
