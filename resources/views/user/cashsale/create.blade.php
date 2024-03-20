@extends('layouts.mydashboard')
@section('title', 'Sales Product Create')
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
                                                        <i class="bx bxs-plus-circle me-1"></i> Sotish <i class="bx bxs-arrow-to-right"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table-striped datatable" style="font-size: 10px" id="cashSalesTable">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Nomi</th>
                                                <th>Sotish Narxi</th>
                                                <th>Miqdori</th>
                                                <th>Jami Narx</th>
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
                                                <td>{{ number_format($cashproduct->amount*$cashproduct->sales_price, 0, '.', ' ') }}</td>
                                                <td>
                                                    <button data-id="{{ $cashproduct->id }}" type="button" class="btn btn-outline-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" >
                                                        <i class="bx bxs-trash me-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-3">
                                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">Sotishni Tasdiqlash</button>
                                        <div class="offcanvas offcanvas-end table-responsive" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                                        <form action="{{ route('totalsales.store') }}" method="POST">
                                            @csrf
                                            <div class="offcanvas-header">
                                                <h5 id="offcanvasEndLabel" class="offcanvas-title">Maxsulotni Sotish</h5>
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="sales_order">Invoice Raqami № 12</label>
                                                    <input type="hidden" class="form-control form-control-sm" id="sales_order" name="sales_order"/>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="total_sales">Jami Savdo</label>
                                                    <input type="text" class="form-control form-control-sm" readonly id="total_sales" name="total_sales">
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="user_id">Kim Tomonidan Kelgan</label>
                                                    <select class="form-control form-control-sm" name="user_id" id="user_id">
                                                       <option>--Xodimni Tanlang--</option>
                                                       <option>Madina</option>
                                                       <option>Nodira</option>
                                                       <option>E'zoza</option>
                                                       <option>Muyassar</option>
                                                       <option>Otabek</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="discount_id">Chegirma %</label>
                                                    <select class="form-control form-control-sm" name="discount_id" id="discount_id">
                                                        @for($i=0; $i<=10; $i++)
                                                            <option value="{{ $i }}">{{ $i }} %</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm">Chegirma Summasi</label>
                                                    <input type="number" readonly step="0.001" class="form-control form-control-sm" name="discount_value" id="discount_value">
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="final_sales">Kassa Summasi</label>
                                                    <input type="text" readonly step="0.01" class="form-control form-control-sm currency_mask" id="final_sales" name="final_sales"/>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="pay_cash">Naqd</label>
                                                    <input type="number" step="0.01" class="form-control form-control-sm" id="pay_cash" name="pay_cash"/>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="pay_plastic">Plastik</label>
                                                    <input type="number" step="0.01" class="form-control form-control-sm" id="pay_plastic" name="pay_plastic"/>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label-sm" for="diff_pay">To'lov Farqi</label>
                                                    <input type="number" step="0.01" class="form-control form-control-sm" readonly id="diff_pay" name="diff_pay"/>
                                                </div>
                                                <hr>
                                                <div class="mb-1 d-none">
                                                    <label class="form-label-sm" for="full_name">Mijoz Ismi</label>
                                                    <input type="text" class="form-control form-control-sm" name="full_name" id="full_name" placeholder="Mijozni Ismini Kiriting...">
                                                    <br>
                                                    <label class="form-label-sm" for="address">Mijoz Manzili</label>
                                                    <input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="Mijozni Manzilini Kiriting...">
                                                    <br>
                                                    <label class="form-label-sm" for="phone1">Telefon Raqami 1</label>
                                                    <input type="text" class="form-control form-control-sm" name="phone1" id="phone1" placeholder="(91) 327-00-97">
                                                    <br>
                                                    <label class="form-label-sm" for="phone2">Telefon Raqami 2</label>
                                                    <input type="text" class="form-control form-control-sm" name="phone2" id="phone2" placeholder="(91) 327-00-97">
                                                </div>

                                                <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Tasdiqlash</button>
                                                <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">Bekor Qilish</button>
                                            </div>
                                        </form>
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
                                    <input type="number" step="0.01" class="form-control amount" id="amount" name="amount" autofocus>
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

    <div class="mt-3">
        <div class="modal modal-top fade" id="deleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="confirmForm" >
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">Eslatma!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Siz rostdan ham ushbu elementni o'chirasizmi!</p>
{{--                        <input type="hidden" id="cashsales_id" name="cashsales_id" >--}}
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
        $(document).ready(function() {
            var total_sales = 0;
            $("#cashSalesTable tbody tr").each( function(){
                let columnValue =  $(this).find('td:eq(4)').text();
                if(columnValue != '')
                {
                    a = columnValue.replace(/\s/g, '');
                    total_sales += parseFloat(a);
                }
                else{
                    total_sales = 0;
                }

            });

            $("#total_sales").val(total_sales.toFixed(0) ?? 0);

           $(document).on('change','#discount_id', function(){
               $('#discount_value').val('');
                var discountAmount = $(this).val();
                let total_sales = $("#total_sales").val();
                if(total_sales != '')
                {
                    let discount_value = parseFloat(total_sales*discountAmount/100);
                    $('#discount_value').val( discount_value.toFixed(0) );
                    let diff = parseFloat(total_sales) - parseFloat(discount_value);
                    $("#final_sales").val( diff.toFixed(0) );

                    $("#diff_pay").val(diff.toFixed(0));
                }
                else{
                    $('#discount_value').val('');
                }
           });
            $(document).on('keyup', '#pay_cash', function(){
                let pay_cash = $("#pay_cash").val();
                let pay_plastic = $("#pay_plastic").val();
                let discount_value =   $('#discount_value').val();
                let total_sales = $("#total_sales").val();
                let diff_pay = total_sales-discount_value-pay_cash-pay_plastic;
                if( parseFloat(diff_pay) < 0 )
                {
                    Swal.fire({
                        title: 'Xatolik',
                        text: "To'lov Qiymati Oshib Ketti!",
                        icon: 'warning',
                        showConfirmButton: true
                    });
                    diff_pay = total_sales-discount_value;
                    $("#pay_cash").val('');
                    $("#pay_plastic").val('');
                    $("#diff_pay").val(diff_pay);
                }
                else{
                    $("#diff_pay").val(diff_pay);
                }


            });
            $(document).on('keyup', '#pay_plastic', function(){
                let pay_plastic = $(this).val();
                let pay_cash = $("#pay_cash").val();
                let discount_value =   $('#discount_value').val();
                let total_sales = $("#total_sales").val();
                let diff_pay = total_sales-discount_value-pay_cash-pay_plastic;
                if( parseFloat(diff_pay) < 0 )
                {
                    Swal.fire({
                        title: 'Xatolik',
                        text: "To'lov Qiymati Oshib Ketti!",
                        icon: 'warning',
                        showConfirmButton: true
                    });
                    diff_pay = total_sales-discount_value;
                    $("#pay_cash").val('');
                    $("#pay_plastic").val('');
                    $("#diff_pay").val(diff_pay);
                }
                else{
                    $("#diff_pay").val(diff_pay);
                }
            });
            // Delete CashSales Product
            $(document).on('click', '.btnDelete', function (e){
                e.preventDefault();
                elemtID = $(this).data('id');
                console.log(elemtID);
                // $("#cashsales_id").val(elemtID);
                $("#confirmForm").prop('action', elemtID);
            })
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

