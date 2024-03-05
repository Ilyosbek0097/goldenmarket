@extends('layouts.mydashboard')
@section('title', 'Branch Create')
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
                        <h5 class="mb-0">Filial Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('branchs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Filial Nomi</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Filial Nomini Kiriting...">
                                @error('name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">Manzili</label>
                                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"  placeholder="Manzilini Kiriting...">
                                @error('address')
                                    <div class="mt-2 text-danger">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">Telefon Raqami</label>
                                <input type="text" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="91 123 45 67">
                                @error('phone')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Rasmi</label>
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" >
                                @error('image')
                                    <div class="text-danger">
                                        {{$message}}
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
