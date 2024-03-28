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
                        <h5 class="mb-0">Chiqim Turini Yaratish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('outputtypes.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="name">Chiqim Turi Nomi</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Chiqim Turini Kiriting...">
                                @error('name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="name">Tadbiq Etuvchi Filiali</label>
                                <select name="branch_id" class="form-control select2" id="branch_id">
                                    <option value="0">Barcha Filiallar Uchun</option>
                                    @foreach($branchAll as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
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
