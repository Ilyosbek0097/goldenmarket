@extends('layouts.mydashboard')
@section('title', 'Supplier Update')
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
                        <h5 class="mb-0">Contragentni Ma'lumotlarini Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $supplierOne->supplier_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label" for="full_name">To'liq Ismi</label>
                                    <input type="text" value="{{ $supplierOne->full_name }}" id="full_name" class="form-control @error('full_name') is-invalid @enderror" name="full_name"  placeholder="Contragent Ismini Kiriting...">
                                    @error('full_name')
                                        <div class="mt-2 text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Manzili</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $supplierOne->address }}" id="address">
                                    @error('address')
                                        <div class="mt-2 text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone1">Telefon Raqami 1</label>
                                    <input type="text" name="phone1" class="form-control @error('phone1') is-invalid @enderror" id="phone1" value="{{ $supplierOne->phone1 }}">
                                    @error('phone1')
                                        <div class="mt-2 text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone2">Telefon Raqami 2</label>
                                    <input type="text" name="phone2" class="form-control @error('phone2') is-invalid @enderror" id="phone2" value="{{ $supplierOne->phone2 }}">
                                    @error('phone2')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="code">Contragent Kodi</label>
                                    <input type="text"  name="code" id="code" readonly class="form-control" value="{{ $supplierOne->code }}" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="passport_image">Passport Rasmi</label>
                                    <input type="file" name="passport_image" readonly class="form-control" id="passport_image">
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
