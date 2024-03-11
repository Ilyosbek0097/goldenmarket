@extends('layouts.mydashboard')
@section('title', 'Type Create')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="row mb-4">
                    <div class="col-lg-12 text-end mt-3 mr-2">
                        <a href="{{ url()->previous() }}" class="btn btn-primary ml-3"><i
                                class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Type Yaratish</h5>
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
                                                    <span class="bs-stepper-title">Maxsulotlar Kiritish</span>
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
                                        <form onsubmit="return false">
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
                                                        <button class="btn btn-label-secondary btn-prev" disabled="">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal Info -->
                                            <div id="personal-info" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Personal Info</h6>
                                                    <small>Enter Your Personal Info.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="first-name">First Name</label>
                                                        <input type="text" id="first-name" class="form-control"
                                                               placeholder="John">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="last-name">Last Name</label>
                                                        <input type="text" id="last-name" class="form-control"
                                                               placeholder="Doe">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="country">Country</label>
                                                        <div class="position-relative">
                                                            <div class="position-relative"><select
                                                                    class="select2 select2-hidden-accessible"
                                                                    id="country" tabindex="-1" aria-hidden="true"
                                                                    data-select2-id="country">
                                                                    <option label=" " data-select2-id="18"></option>
                                                                    <option>UK</option>
                                                                    <option>USA</option>
                                                                    <option>Spain</option>
                                                                    <option>France</option>
                                                                    <option>Italy</option>
                                                                    <option>Australia</option>
                                                                </select><span
                                                                    class="select2 select2-container select2-container--default"
                                                                    dir="ltr" data-select2-id="17" style="width: auto;"><span
                                                                        class="selection"><span
                                                                            class="select2-selection select2-selection--single"
                                                                            role="combobox" aria-haspopup="true"
                                                                            aria-expanded="false" tabindex="0"
                                                                            aria-disabled="false"
                                                                            aria-labelledby="select2-country-container"><span
                                                                                class="select2-selection__rendered"
                                                                                id="select2-country-container"
                                                                                role="textbox"
                                                                                aria-readonly="true"><span
                                                                                    class="select2-selection__placeholder">Select value</span></span><span
                                                                                class="select2-selection__arrow"
                                                                                role="presentation"><b
                                                                                    role="presentation"></b></span></span></span><span
                                                                        class="dropdown-wrapper"
                                                                        aria-hidden="true"></span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="language">Language</label>
                                                        <div class="dropdown bootstrap-select show-tick w-auto"><select
                                                                class="selectpicker w-auto" id="language"
                                                                data-style="btn-transparent" data-icon-base="bx"
                                                                data-tick-icon="bx-check text-white" multiple="">
                                                                <option>English</option>
                                                                <option>French</option>
                                                                <option>Spanish</option>
                                                            </select>
                                                            <button type="button" tabindex="-1"
                                                                    class="btn dropdown-toggle bs-placeholder btn-transparent"
                                                                    data-bs-toggle="dropdown" role="combobox"
                                                                    aria-owns="bs-select-1" aria-haspopup="listbox"
                                                                    aria-expanded="false" title="Nothing selected"
                                                                    data-id="language">
                                                                <div class="filter-option">
                                                                    <div class="filter-option-inner">
                                                                        <div class="filter-option-inner-inner">Nothing
                                                                            selected
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-1"
                                                                     tabindex="-1" aria-multiselectable="true">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Social Links -->
                                            <div id="social-links" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Social Links</h6>
                                                    <small>Enter Your Social Links.</small>
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
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="google">Google+</label>
                                                        <input type="text" id="google" class="form-control"
                                                               placeholder="https://plus.google.com/abc">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="linkedin">LinkedIn</label>
                                                        <input type="text" id="linkedin" class="form-control"
                                                               placeholder="https://linkedin.com/abc">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-prev">
                                                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
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
