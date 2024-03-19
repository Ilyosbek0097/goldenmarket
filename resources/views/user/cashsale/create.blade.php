@extends('layouts.mydashboard')
@section('title', 'Brand Create')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @error('product_id')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @error('amount')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 text-end mt-3 mr-2">
                        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Maxsulotlarni Sotish</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" id="sales_order" value="{{ $warehouseProduct[0]['sales_order'] }}">
                            </div>
                            <div class="col-lg-6">
                                <table class="table-striped datatable" style="font-size: 10px">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Nomi</th>
                                            <th>Sotish Narxi</th>
                                            <th>Qoldig'i</th>
                                            <th>Amal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($warehouseProduct as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->productname->type->type_name }} {{ $product->productname->brand->brand_name }} {{ $product->productname->model_name }}</td>
                                                <td>{{ number_format($product->sales_price, 0, '.', ' ') }}</td>
                                                <td>{{ $product->amount }}</td>
                                                <td>
                                                    <button data-id="{{ $product->product_id }}" type="button" class="btn btn-warning btn-sm btnModal" data-bs-toggle="modal" data-bs-target="#smallModal" >
                                                        <i class="bx bxs-plus-circle me-1"></i> Sotish <i class="bx bxs-arrow-to-right"
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table-striped datatable" style="font-size: 10px">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Nomi</th>
                                                <th>Sotish Narxi</th>
                                                <th>Miqdori</th>
                                                <th>Amal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cashSalesProduct as $cashproduct)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cashproduct->product->type->type_name }} {{ $cashproduct->product->brand->brand_name }} {{ $cashproduct->product->model_name }}</td>
                                                <td>{{ number_format($cashproduct->sales_price, 0, '.', ' ') }}</td>
                                                <td>{{ $cashproduct->amount }}</td>
                                                <td>
                                                    <button data-id="{{ $cashproduct->id }}" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" >
                                                        <i class="bx bxs-trash me-1"></i>
                                                    </button>
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
    <div class="mt-3">
        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Maxsulot Ma'lumoti</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('cashsales.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameSmall" class="form-label">Nomi:<span id="productName" class="text-danger"></span></label><br>
                                    <label for="product_amount" class="form-label">Qoldig'i:<span id="product_amount" class="text-danger"></span></label><br>
                                    <label for="sales_price" class="form-label">Sotish Narxi:<span id="sales_price" class="text-danger"></span></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label class="form-label" for="amount">Sotish Miqdori</label>
                                    <input type="number" class="form-control amount" id="amount" name="amount" autofocus>
                                    <input type="hidden" name="product_id" id="productID"/>
                                    <input type="hidden" id="productAmount"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Bekor Qilish</button>
                            <button type="submit" id="btnSubmit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btnModal', function(){

                $("#btnSubmit").removeAttr('disabled');
                $("#amount").val('');
               var row = $(this).closest('tr');
               var productName = row.find('td:eq(1)').text();
                $("#productName").text(" "+productName);

               var productAmount = row.find('td:eq(3)').text();
               $("#productAmount").val(productAmount.replace(/\s/g, ''));

               $("#product_amount").text(" " + productAmount);

               $("#sales_price").text(" " + row.find('td:eq(2)').text() + " UZS");

               productID = $(this).data("id");
               $("#productID").val(productID);
                // $('#amount').focus();
            });
            $(document).on('blur, keyup, keydown', "#amount", function(){

                var amount = $(this).val();
                var productAmount = $("#productAmount").val();
                if(parseFloat(amount) <= 0)
                {
                    $("#btnSubmit").attr('disabled', 'true');
                    Swal.fire({
                       title: '',
                       text: "Maxsulot Miqdori Qiymati To'g'ri Emas!",
                       icon: 'warning',
                       showConfirmButton: false,
                       timer: 1500
                    });
                    $("#amount").val('');
                }
                else if(parseFloat(amount) > parseFloat(productAmount) )
                {
                    Swal.fire({
                        title: '',
                        text: "Omborda Buncha Qiymat Qolmagan!",
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#amount").val('');

                }
                else{
                    $("#btnSubmit").removeAttr('disabled');
                }

            });
        });
    </script>
@endsection

