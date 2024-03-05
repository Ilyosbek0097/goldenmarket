@extends('layouts.mydashboard')
@section('title', 'Student Create')
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
                        <h5 class="mb-0">O'quvchi Kiritish</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="first_name">Ismi</label>
                                <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  placeholder="Ismini Kiriting..." value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="last_name">Familyasi</label>
                                <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  placeholder="Familyasini Kiriting..." value="{{ old('last_name') }}">
                                @error('last_name')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="date_of_birth">Tug'ilgan Sanasi</label>
                                <input type="date" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"  value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Telefon Raqami</label>
                                <input type="text" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="91 123 45 67" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="student_code">O'quvchi Kodi</label>
                                <input type="text" readonly value="{{ $student_code }}" id="student_code" class="form-control @error('student_code') is-invalid @enderror" name="student_code" >
                                @error('student_code')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="branch_id">Filialini Tanlang</label>
                                <select id="branch_id" name="branch_id" class="form-control @error('branch_id') is-invalid @enderror">
                                    <option disabled selected>--- Ma'lumotini Tanlang ---</option>
                                    @foreach($branchs as $branch)
                                     <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="mt-2 text-danger">
                                    {{ $message}}
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
@section('script')
<script>

</script>
@endsection
