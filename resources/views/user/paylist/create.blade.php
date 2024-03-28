@extends('layouts.mydashboard')
@section('title', 'Sales Product Create')
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @error('error')
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
        </div>
        <div class="col-lg-12 mb-1 order-0">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 text-end mt-1 mr-2 mb-1">
                        <a href="{{ url()->previous() }}" class="btn btn-primary ml-2"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="{{ route('paylists.store') }}" method="POST">
                @csrf
                    <div class="card mb-4">
                        <h5 class="card-header">Chiqim Kassa</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <div>
                                <div class="mb-3">
    {{--                                {{ dd( $errors->all()) }}--}}
        {{--                            {{ $incomeDiffCash = $incomePayAllCash - $outputPayAllCash }}--}}
                                    <input type="hidden" id="pay_cash" value="{{ $incomePayAllCash - $outputPayAllCash }}">
                                    <input type="hidden" id="pay_plastic" value="{{ $incomePayAllPlastic - $outputPayAllPlastic }}">

                                    <span class="text-success">Jami Naqd: <span >{{ number_format($incomePayAllCash - $outputPayAllCash, 0, '.', ' ')  }}</span> </span>
                                    <span class="text-danger" style="margin-left: 100px">Jami Plastik: <span id="pay_plastic">{{ number_format($incomePayAllPlastic - $outputPayAllPlastic, 0, '.', ' ') }}</span> </span><br>
                                </div>
                                <label class="form-label" for="all_cash">Jami Kassa</label>
                                <input type="text" id="all_cash" class="form-control" value="{{ number_format($incomePayAllCash - $outputPayAllCash + $incomePayAllPlastic - $outputPayAllPlastic, 0, '.', ' ') }}">
                            </div>
                            <div>
                               <label class="form-label" for="output_type_id">Chiqim Sababi</label>
                               <select class="form-control @error('output_type_id') is-invalid @enderror select2" id="output_type_id" name="output_type_id">
                                   <option value="">-- Chiqim Sababini Tanlang --</option>
                                   @foreach($outputTypeAll as $type)
                                       <option value="{{ $type->id }}">{{ $type->name }}</option>
                                   @endforeach
                               </select>
                                @error('output_type_id')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label" for="pay_type">Summa Turini Tanlang</label>
                                <select class="form-control select2 @error('pay_type') is-invalid @enderror" name="pay_type" id="pay_type">
                                    <option value=""> -- Summa Turini Tanlang --</option>
                                    <option value="naqd">Naqd</option>
                                    <option value="plastik">Plastik</option>
                                </select>
                                @error('pay_type')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label" for="pay_sum">Chiqim Summasi</label>
                                <input type="number" step="0.01" class="form-control @error('pay_sum') is-invalid @enderror" name="pay_sum" id="pay_sum" >
                                @error('pay_sum')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label" for="comment">Izoxi</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" placeholder="Comment"></textarea>
                                @error('comment')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="float-end mt-2">
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                                <button type="reset" class="btn btn-danger">Bekor Qilish</button>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
        <div class="col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Chiqimlar Ro'yxati</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <table class="table-striped datatable text-center" style="font-size: small">
                        <thead>
                            <tr>
                                <td>#ID</td>
                                <td>Sana</td>
                                <td>Summa Turi</td>
                                <td>Summa</td>
                                <td>Status</td>
                                <td>Izoxi</td>
                                <td>Amallar</td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($outputPayAll as $pay)
                              @if($pay->in_out_status == 1 )
                                  <tr>
                                      <td>{{$pay->id}}</td>
                                      <td>{{ \Illuminate\Support\Carbon::create($pay->date)->format('d-M-Y') }}</td>
                                      <td> <span class="badge bg-{{ $pay->pay_type == 'naqd' ? 'success' : 'warning'  }}"> {{ $pay->pay_type }}</span></td>
                                      <td>{{ number_format($pay->pay_sum, 0, '.', ' ') }}</td>
                                      <td> {{ $pay->check_status }}</td>
                                      <td>{{ $pay->comment }}</td>
                                      <td>
                                          <a class="btn btn-danger btn-sm" href=" {{ route('paylists.edit', $pay->id) }}"><i class="bx bx-trash me-1"></i></a>
                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function(){

           $(document).on('blur', '#pay_sum', function (){
               var pay_type = $("#pay_type").val();
               var pay_sum = $(this).val();
               var pay_cash = $("#pay_cash").val();
               var pay_plastic = $("#pay_plastic").val();

             if(pay_type == "naqd"){
                 if(parseFloat(pay_sum) > parseFloat(pay_cash) )
                 {
                     $("#pay_sum").val('');
                     Swal.fire({
                         title: 'Diqqat!',
                         text: "Naqd Kassada Buncha Qiymat Qolmagan!",
                         icon: 'warning',
                         showConfirmButton: false,
                         timer: 1500
                     });

                 }
             }
             else if(pay_type == 'plastik'){
                 if(parseFloat(pay_sum) > parseFloat(pay_plastic))
                 {
                     $("#pay_sum").val('');
                     Swal.fire({
                         title: 'Diqqat!',
                         text: "Plastik Kassada Buncha Qiymat Qolmagan!",
                         icon: 'warning',
                         showConfirmButton: false,
                         timer: 1500
                     });
                 }
             }
             else{
                 Swal.fire({
                     title: 'Diqqat!',
                     text: "Avval Summa Turini Tanlang!",
                     icon: 'warning',
                     showConfirmButton: false,
                     timer: 1500
                 })
                 $("#pay_sum").val('');
             }
           });

        });
    </script>
@endsection

