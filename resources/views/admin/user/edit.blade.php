@extends('layouts.mydashboard')
@section('title', 'Type Update')
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
                        <h5 class="mb-0">Turni Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="name">Xodim Ismi</label>
                                <input type="text" value="{{ $user->name }}" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Xodim Ismini Kiriting...">
                                @error('name')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" value="{{ $user->email }}"  id="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Emailini Kiriting...">
                                @error('email')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="role">Xodim Mavqeyi</label>
                                <select name="role" class="form-control select2" id="role" >
                                    <option value="user">Sotuvchi</option>
                                </select>
                                @error('role')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="branch_id">Filialini Tanlang</label>
                                <select name="branch_id" class="form-control select2" id="branch_id" >
                                    <option value="">--Filialini Tanlang--</option>
                                    @foreach($branchAll as $branch)
                                        <option @if($user->branch_id == $branch->id) selected @endif value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="current_password">Eski Parol</label>
                                <input role="current_password" autocomplete="off" type="password" id="current_password" class="form-control @error('password') is-invalid @enderror" name="current_password">
                                @error('current_password')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Yangi Parol</label>
                                <input autocomplete="off"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Parolni Kiriting...">
                                @error('password')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Parolni Tasdiqlash</label>
                                <input autocomplete="off"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
                                @error('password_confirmation')
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
@section('script')
    <script>

    </script>
@endsection
