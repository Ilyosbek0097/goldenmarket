@extends('layouts.mydashboard')
@section('title', 'Currency Create')
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
                        <h5 class="mb-0">Valyuta Kursi</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('currencys.store') }}" method="POST">
                            @csrf
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label" for="usd">$ Qiymati</label>
                                    <div class="input-group">
                                        <span class="input-group-text text-success">$</span>
                                        <input type="number" value="1" readonly  step="0.01" class="form-control @error('usd') is-invalid @enderror" name="usd" id="usd">
                                    </div>
                                    @error('usd')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              <div class="col-sm-6">
                                  <label class="form-label" for="uzs">SO`M Qiymati</label>
                                  <div class="input-group">
                                      <span class="input-group-text text-warning">uzs</span>
                                      <input type="number"  step="0.01" class="form-control @error('uzs') is-invalid @enderror" name="uzs" id="uzs">
                                  </div>
                                  @error('uzs')
                                  <div class="mt-2 text-danger" role="alert">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Saqlash</button>
                            <button type="reset" class="btn btn-danger ">Bekor Qilish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
