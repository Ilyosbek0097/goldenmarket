@extends('layouts.mydashboard')
@section('title', 'Product Name Edit')
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
                        <h5 class="mb-0">Maxsulot To'liq Nomini Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('productnames.update', $productname->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="type_id">Maxsulot Turini Tanlang</label>
                                <select name="type_id" id="type_id" class="form-control select2">
                                    <option value="">--Maxsulot Turini Tanlang--</option>
                                    @foreach($typeAll as $type)
                                        <option value="{{$type->type_id}}" {{ $type->type_id == $productname->type_id ? 'selected' : '' }}>{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="brand_id">Brendini Tanlang</label>
                                <select name="brand_id" class="form-control select2 @error('brand_id') is-invalid @enderror" id="brand_id">
                                    @foreach($brandAll as $brand)
                                        <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $productname->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="text-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="model_name">Modeli</label>
                                <input type="text" name="model_name" class="form-control @error('model_name') is-invalid @enderror" id="model_name" value="{{ $productname->model_name }}">
                                @error('model_name')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="old_code">Eski Kodi</label>
                                <input name="old_code" class="form-control @error('old_code') is-invalid @enderror" id="old_code" value="{{ $productname->old_code }}">
                                @error('old_code')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label" for="barcode">Barcode</label>--}}
{{--                                <input readonly class="form-control @error('barcode') is-invalid @enderror" name="barcode" id="barcode" value="{{ $productname->barcode }}">--}}
{{--                                @error('barcode')--}}
{{--                                <div class="mt-2 text-danger">--}}
{{--                                    {{$message}}--}}
{{--                                </div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

                            <button type="submit" class="btn btn-primary">Saqlash</button>
                            <button type="reset" class="btn btn-danger">Bekor Qilish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        // $(document).ready(function(){--}}
{{--        //     alert('salom');--}}
{{--        // });--}}
{{--    </script>--}}
{{--@endsection--}}
