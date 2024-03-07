@extends('layouts.mydashboard')
@section('title', 'Brand Create')
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
                        <h5 class="mb-0">Brend Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="type_id">Maxsulot Turini Tanlang</label>
                                <select name="type_id" id="type_id" class="form-control select2">
                                    <option value="">--Maxsulot Turini Tanlang--</option>
                                    @foreach($typeAll as $type)
                                        <option value="{{$type->type_id}}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Brend Nomi</label>
                                <input type="text" id="brand_name" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name"  placeholder="Maxsulot Brendini Kiriting...">
                                @error('brand_name')
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
