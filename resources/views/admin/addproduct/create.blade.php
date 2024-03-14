@extends('layouts.mydashboard')
@section('title', 'Add Product')
@section('content')
    <div class="row">
        <div class="col-lg-12 order-0">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 text-end mt-3 mr-2">
                        <a href="{{ url()->previous() }}" class="btn btn-primary ml-3"><i
                                class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Maxsulot Qo'shish</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mt-4 mb-4">
                                <small class="text-light fw-medium">Maxsulotlarn Bazaga Qo'shish</small>
                                <div class="bs-stepper wizard-numbered mt-2">
                                    <div class="bs-stepper-header">
                                        <div class="step active" data-target="#account-details">
                                            <button type="button" class="step-trigger" aria-selected="true">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label mt-1">
                                                  <span class="bs-stepper-title">Faktura Ma'lumotlari</span>
                                                      <span class="bs-stepper-subtitle">Yuk Ma'lumotlarini Kiriting</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i class="bx bx-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#personal-info">
                                            <button type="button" class="step-trigger" aria-selected="false">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label mt-1">
                                                    <span class="bs-stepper-title">Maxsulotlar Ma'lumotlari</span>
                                                        <span class="bs-stepper-subtitle">Maxsulotlarni Kiriting!</span>
                                                    </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i class="bx bx-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#social-links">
                                            <button type="button" class="step-trigger" aria-selected="false">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label mt-1">
                                                    <span class="bs-stepper-title">Tekshiruv</span>
                                                         <span class="bs-stepper-subtitle">Barcha Ma'lumotlarni Tekshiring!</span>
                                                    </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <form action="{{ route('addproducts.store') }}" method="POST" id="addProductForm">
                                            @csrf
                                            <!-- Account Details -->
                                            <div id="account-details" class="content active dstepper-block">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Faktura Ma'lumotlari</h6>
                                                    <small>Yuk Ma'lumotlarini Kiriting!</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                       <label class="form-label" for="supplier_id">Contragent</label>
                                                        <select class="form-control addItem select2 @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id">
                                                            <option value="">--Contragentni Tanlang--</option>
                                                            @foreach($supplierAll as $supplier)
                                                                <option value="{{$supplier->supplier_id}}">{{ $supplier->full_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('supplier_id')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="register_date">Kelgan Sanasi</label>
                                                        <input type="date" name="register_date" class="addItem form-control @error('register_date') is-invalid @enderror" id="register_date">
                                                        @error('register_date')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="branch_id">Filial</label>
                                                        <select class="addItem form-control select2 @error('branch_id') is-invalid @enderror" name="branch_id" id="branch_id">
                                                            <option value="">--Filialni Tanlang--</option>
                                                            @foreach($branchAll as $branch)
                                                                <option value="{{$branch->id}}">{{ $branch->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('branch_id')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
{{--                                                        {{ dd($invoice_order) }}--}}
                                                        <label class="form-label" for="invoice_order">Invoice Raqami</label>
                                                        <select class="addItem form-control select2  @error('invoice_order') is-invalid @enderror" name="invoice_order" id="invoice_order">
                                                            @if(!$addProductAll->isEmpty())
                                                                @php
                                                                    $uniqueInvoiceOrders = $addProductAll->pluck('invoice_order')->unique();
                                                                @endphp
                                                                @foreach($uniqueInvoiceOrders as $invoice_order)
                                                                    <option @if($addProductAll->last()->invoice_order == $invoice_order) selected @endif value="{{ $invoice_order }}">№ {{ $invoice_order }}</option>
                                                                @endforeach
                                                                <option value="{{ $invoice_order+1 }}">№ {{ $invoice_order+1 }}</option>
                                                            @else
                                                                <option value="1">№ 1</option>
                                                            @endif

                                                        </select>
                                                        @error('invoice_order')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev" disabled="" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none" >Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-primary"  id="nextOne" type="button">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Keyingisi</span>
                                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                        </button>
                                                        <button class="btn btn-primary btn-next d-none"   id="nextTo" type="button">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Keyingisi</span>
                                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal Info -->
                                            <div id="personal-info" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Maxsulotlar Ma'lumotlari</h6>
                                                    <small>Maxsulotlar Ma'lumotlarini Kiriting</small>
                                                </div>
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
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="product_id">Maxulotni Tanlang</label>
                                                        <select class="form-control select2 @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                                                            <option value="">--Maxsulotni Tanlang--</option>
                                                            @foreach($productNameAll as $product)
                                                                <option value="{{ $product->id }}">{{ $product->type->type_name }} {{ $product->brand->brand_name }} {{$product->model_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('product_id')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="amount">Maxsulot Miqdori</label>
                                                        <input type="number"  step="0.01"  class="form-control @error('amount') is-invalid @enderror decimal_type" name="amount" id="amount">
                                                        @error('amount')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="body_price_uzs">Kirim So`m</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text text-warning">uzs</span>
                                                            <input type="number"  step="0.01" class="form-control @error('body_price_uzs') is-invalid @enderror decimal_type" name="body_price_uzs" id="body_price_uzs">
                                                        </div>
                                                        @error('body_price_uzs')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror

                                                    </div>
                                                   <div class="col-sm-6">
                                                       <label class="form-label" for="body_price_usd">Kirim $</label>
                                                       <div class="input-group">
                                                           <span class="input-group-text text-success">$</span>
                                                           <input type="number"  step="0.01"  name="body_price_usd" class="form-control @error('body_price_usd') is-invalid @enderror decimal_type" id="body_price_usd" >
                                                       </div>
                                                       @error('body_price_usd')
                                                       <div class="mt-2 text-danger" role="alert">
                                                           {{ $message }}
                                                       </div>
                                                       @enderror
                                                   </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="mark_id">Maxsulot Natsenkasi</label>
                                                        <select name="mark_id" class="form-control select2 @error('mark_id') is-invalid @enderror" id="mark_id">
                                                                <option data-mark="" value="">---Natsenkani Tanlang---</option>
                                                            @foreach($markAll as $mark)
                                                                <option data-mark="{{ $mark->value }}" value="{{ $mark->mark_id }}">{{ $mark->mark_name }} Tipi--{{$mark->type}} Qiymati -- {{ round($mark->value) }}%</option>
                                                            @endforeach
                                                        </select>
                                                        @error('mark_id')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="sales_price">Maxsulot Sotish Narxi</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text text-warning">uzs</span>
                                                            <input readonly type="number"  step="0.01" class="form-control @error('sales_price') is-invalid @enderror decimal_type" name="sales_price" id="sales_price">
                                                        </div>
                                                        @error('sales_price')
                                                        <div class="mt-2 text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next" type="button" id="decimal_test">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Keyingisi</span>
                                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Social Links -->
                                            <div id="social-links" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Tekshiruv</h6>
                                                    <small>Tasdiqlang!</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">

                                                    </div>
                                                    <div class="col-sm-6">
                                                    <input  id="dollar_kursi" type="hidden" value="{{ session()->get('dollar_kursi') }}">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none" >Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-success btn-submit" type="submit">Submit</button>
                                                    </div>
                                                </div>
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
@endsection
@section('script')
    <script>
       $(document).ready(function(){
           $("#nextOne").click(function(){
               var isEmpty = 0;
              $(".addItem").each(function(){
                var val = $(this).val();
                if(val.trim() === '')
                {
                    isEmpty++;
                    return false;
                }
              });
              if(isEmpty > 0)
              {
                 Swal.fire({
                     title: '',
                     text: "Bo'sh Maydonlarni To'ldiring!",
                     icon: 'warning',
                     showConfirmButton: false,
                     timer: 1000,
                 })

              }
              else{
                  $("#nextTo").click();
              }

           });
           $("#body_price_uzs").blur(function(){
              var value = $(this).val();
              var mark_value = $("#mark_id").select2().find(":selected").data("mark");
              if(value != 0)
              {
                  $("#body_price_usd").val('0');
                 if(mark_value != "")
                 {
                     var sales_price = value * ( 1+mark_value/100 );

                     $("#sales_price").val(sales_price.toFixed(2));
                 }
              }
           });
           $("#body_price_usd").blur(function(){
               var value = $(this).val();
               var mark_value = $("#mark_id").select2().find(":selected").data("mark");
               if(value != 0)
               {
                   $("#body_price_uzs").val('0');
                   if(mark_value != "")
                   {
                       var currency = $("#dollar_kursi").val();
                       var sales_price = value * currency*( 1+mark_value/100 );
                       $("#sales_price").val(sales_price.toFixed(2));
                   }
               }

           });
           $("#mark_id").select2().change(function(){
               var mark_value = $(this).find(":selected").data("mark");
               var uzs = $("#body_price_uzs").val();
               var usd = $("#body_price_usd").val();
               var dollar_kursi = $("#dollar_kursi").val();
               if(usd == 0 && uzs >0)
               {
                   var sales_price = uzs*(1+mark_value/100);
                   $("#sales_price").val(sales_price.toFixed(2));
               }
               else if(uzs == 0 && usd > 0){
                   var sales_price = usd * dollar_kursi * (1 + mark_value/100);
                   $("#sales_price").val(sales_price.toFixed(2));
               }
               else{
                   Swal.fire({
                       title: '',
                       text: "Valyuta Qiymati Hech Bo'lmasa Biri Noldan Farqli Bo'lishi Kerak!",
                       icon: 'error',
                       showConfirmButton: false,
                       timer: 2000
                   });
                   $("#mark_id option:eq(0)").prop('selected', true);
                   $("#body_price_uzs").val('');
                   $("#body_price_usd").val('');
               }
           });
           $("#decimal_test").click(function(){
              $(".decimal_type").each(function (){
                  var value = parseFloat($(this).val());
                  var decimalPartLength = ($(this).val().split('.')[1] || '').length;

                  if (decimalPartLength > 2) {
                      alert("Xatolik: " + $(this).val() + " - Ushbu qiymatda o'nlik kasr qismida 3 dan ko'p raqam mavjud. Verguldan Keyin Faqat 2 Ta Raqam Yozing");
                      $(this).val('');
                  }
              });
           });
       });
    </script>
@endsection
