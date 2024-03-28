@extends('layouts.mydashboard')
@section('title', 'Supplier Create')
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
                        <h5 class="mb-0">Contragent Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('suppliers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="full_name">To'liq Ismi</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name"  placeholder="Contagentni To'liq Isnmini Kiriting...">
                                @error('full_name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">Manzili</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"  placeholder="Manzilini Kiriting...">
                                @error('address')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone1">Telefon Raqami 1</label>
                                <input type="text" id="phone1" class="form-control @error('phone1') is-invalid @enderror" name="phone1"  placeholder="Telefon Raqamini Kiriting...">
                                @error('phone1')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone2">Telefon Raqami 2</label>
                                <input type="text" id="phone2" class="form-control @error('phone2') is-invalid @enderror" name="phone2"  placeholder="Boshqa Telefon Raqamini Kiriting...">
                                @error('phone2')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="code">Contagent Kodi</label>
                                <input readonly type="text" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code"  value="{{ StrToUpper(\Illuminate\Support\Str::random(5)) }}">
                                @error('code')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="passport_image">Contragent Pasporti</label>
                                <input type="file" class="form-control @error('passport_image') is-invalid @enderror" name="passport_image">
                                @error('passport_image')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Saqlash</button>
                            <button type="reset" class="btn btn-danger">Bekor Qilish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
