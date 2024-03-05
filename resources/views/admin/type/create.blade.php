@extends('layouts.mydashboard')
@section('title', 'Type Create')
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
                        <h5 class="mb-0">Type Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('types.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Type Nomi</label>
                                <input type="text" id="type_name" class="form-control @error('type_name') is-invalid @enderror" name="type_name"  placeholder="Maxsulot Turini Kiriting...">
                                @error('type_name')
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
