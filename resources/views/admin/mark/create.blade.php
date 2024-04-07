@extends('layouts.mydashboard')
@section('title', 'Mark Create')
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
                        <h5 class="mb-0">Natsenka Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('marks.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="mark_name">Natsenka Nomi</label>
                                <input type="text" id="mark_name" class="form-control @error('mark_name') is-invalid @enderror" name="mark_name"  placeholder="Natsenka Nomini Kiriting...">
                                @error('mark_name')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="type">Natsenka Tipini Tanlang</label>
                                <select name="type" id="type" class="form-control select2">
                                    <option value="">--Natsenka Tipini Tanlang--</option>
                                    <option value="A">A -Tip</option>
                                    <option value="B">B -Tip</option>
                                    <option value="C">C -Tip</option>
                                </select>
                                @error('type')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="value">Natsenka Qiymati (%)</label>
                                <input type="number" step="0.01" id="value" class="form-control @error('value') is-invalid @enderror" name="value"  placeholder="Natsenka Qiymatini Kiriting... Misol 10">
                                @error('value')
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
