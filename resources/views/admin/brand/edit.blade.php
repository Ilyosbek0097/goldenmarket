@extends('layouts.mydashboard')
@section('title', 'Brand Update')
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
                        <h5 class="mb-0">Brendni Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.update', $brand->brand_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="type_id">Maxsulot Tipi</label>
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach($typeAll as $type)
                                            <option   class="@if($type->type_id == $brand->type_id) text-success @endif" value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="brand_name">Tur Nomi</label>
                                <input type="text" value="{{ $brand->brand_name }}" id="brand_name" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name"  placeholder="Brend Nomini Kiriting...">
                                @error('brand_name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                            <a type="btn btn-danger" href="{{ url()->previous() }}" class="btn btn-danger">Bekor Qilish</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
