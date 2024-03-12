@extends('layouts.mydashboard')
@section('title', 'Type Create')
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
                                        <form action="{{ route('addproducts.store') }}" method="POST">
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
                                                        <select class="form-control select2 @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id">
                                                            <option value="">--Contragentni Tanlang--</option>
                                                            @foreach($supplierAll as $supplier)
                                                                <option value="{{$supplier->supplier_id}}">{{ $supplier->full_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="register_date">Kelgan Sanasi</label>
                                                        <input type="date" name="register_date" class="form-control @error('register_date') is-invalid @enderror" id="register_date">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="branch_id">Filial</label>
                                                        <select class="form-control select2 @error('branch_id') is-invalid @enderror" name="branch_id" id="branch_id">
                                                            <option value="">--Filialni Tanlang--</option>
                                                            @foreach($branchAll as $branch)
                                                                <option value="{{$branch->id}}">{{ $branch->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="invoice_order">Invoice Raqami</label>
                                                        <select class="form-control  @error('invoice_order') is-invalid @enderror" name="invoice_order" id="invoice_order">
                                                            <option value="1">1</option>
                                                            <option selected value="2">2</option>
                                                            <option value="3">3</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev" disabled="" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none" >Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next" type="button">
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
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="product_id">Maxulotni Tanlang</label>
                                                        <select class="form-control select2 @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                                                            <option value="">--Maxsulotni Tanlang--</option>
                                                            @foreach($productNameAll as $product)
                                                                <option value="{{ $product->id }}">{{ $product->type($product->type_id)->type_name }} {{ $product->brand($product->brand_id)->brand_name }} {{$product->model_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="amount">Maxsulot Miqdori</label>
                                                        <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="body_price_uzs">Kirim So`m</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text text-warning">uzs</span>
                                                            <input type="number" class="form-control @error('body_price_uzs') is-invalid @enderror" name="body_price_uzs" id="body_price_uzs">
                                                        </div>

                                                    </div>
                                                   <div class="col-sm-6">
                                                       <label class="form-label" for="body_price_usd">Kirim $</label>
                                                       <div class="input-group">
                                                           <span class="input-group-text text-success">$</span>
                                                           <input type="number" class="form-control @error('body_price_usd') is-invalid @enderror" id="body_price_usd" name="body_price_usd">
                                                       </div>
                                                   </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="mark_id">Maxsulot Natsenkasi</label>
                                                        <select name="mark_id" class="form-control select2 @error('mark_id') is-invalid @enderror" id="mark_id">
                                                                <option>---Natsenkani Tanlang---</option>
                                                            @foreach($markAll as $mark)
                                                                <option value="{{ $mark->mark_id }}">{{ $mark->mark_name }} Tipi--{{$mark->type}} Qiymati -- {{ $mark->value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="sales_price">Maxsulot Sotish Narxi</label>
                                                        <input type="number" class="form-control @error('sales_price') is-invalid @enderror" name="sales_price" id="sales_price">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next" type="button">
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
                                                        <label class="form-label" for="twitter">Twitter</label>
                                                        <input type="text" id="twitter" class="form-control"
                                                               placeholder="https://twitter.com/abc">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="facebook">Facebook</label>
                                                        <input type="text" id="facebook" class="form-control"
                                                               placeholder="https://facebook.com/abc">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev" type="button">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none" >Avvalgisi</span>
                                                        </button>
                                                        <button class="btn btn-success btn-submit">Submit</button>
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
