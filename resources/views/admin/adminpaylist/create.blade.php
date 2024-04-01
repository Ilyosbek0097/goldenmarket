@extends('layouts.mydashboard')
@section('title', 'AdminPayList Create')
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="offset-md-1 col-md-10">
            @if($message = session()->get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($message = session()->get('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
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
                        <a href="{{route('adminpaylists.index') }}" class="btn btn-primary ml-2"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="{{ route('adminpaylists.outputstore') }}" method="POST">
                @csrf
                    <div class="card mb-4">
                        <h5 class="card-header">Chiqim Kassa</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <div>
                                <div class="mb-3">
                                    <input type="hidden" id="pay_cash" value="{{ $incomePayAllCash - $outputPayAllCash }}">
                                    <input type="hidden" id="pay_plastic" value=" {{$incomePayAllPlastic-$outputPayAllPlastic}}">

                                    <span class="text-success">Jami Naqd: <span >{{ number_format($incomePayAllCash - $outputPayAllCash, 0, '.', ' ')  }}</span> </span>
                                    <span class="text-primary" style="margin-left: 100px;">Jami Plastik: <span id="pay_plastic">{{ number_format($incomePayAllPlastic-$outputPayAllPlastic, 0, '.', ' ') }}</span> </span><br>
                                    <hr>
                                </div>
                                <label class="form-label" for="all_cash">Jami Kassa</label>
                                <input type="text" id="all_cash" class="form-control" value="{{ number_format($incomePayAllCash - $outputPayAllCash + $incomePayAllPlastic-$outputPayAllPlastic , 0, '.', ' ') }}">
                            </div>
                            <div>
                               <label class="form-label" for="output_type_id">Kontragentlar</label>
                               <select class="form-control @error('output_type_id') is-invalid @enderror select2" id="output_type_id" name="output_type_id">
                                   <option value="">-- Kontragentni Tanlang --</option>
                                   @foreach($supplierAll as $supplier)
                                       <option value="{{ $supplier->supplier_id }}">{{ $supplier->full_name }}</option>
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
                    <table class="table-striped table-bordered datatable text-center" style="font-size: 10px">
                        <thead>
                            <tr>
                                <td>#ID</td>
                                <td>Sana</td>
                                <td>Holati</td>
                                <td>Summa Turi</td>
                                <td>Summa</td>
                                <td>Chiqim Sababi</td>
                                <td>Izoxi</td>
                                <td>Amallar</td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($adminPayListAll as $pay)
                                      <tr>
                                          <td>{{$pay->id}}</td>
                                          <td>{{ \Illuminate\Support\Carbon::create($pay->date)->format('d-M-Y') }}</td>
                                          <td>
                                              @if($pay->in_out_status == 0)
                                                  <span class="badge bg-label-success" role="status" aria-hidden="true">Kirim</span>
                                              @elseif($pay->in_out_status == 1)
                                                  <span class="badge bg-label-danger">Chiqim</span>
                                              @else
                                                  <span class="badge bg-label-danger"><i class="bx bx-x-circle"></i></span>
                                              @endif
                                          </td>
                                          <td> <span class="badge bg-{{ $pay->pay_type == 'naqd' ? 'success' : 'warning'  }}"> {{ $pay->pay_type }}</span></td>
                                          <td>{{ number_format($pay->pay_sum, 0, '.', ' ') }}</td>
                                          <td> {{ $pay->supplier ? $pay->supplier->full_name : '' }}</td>
                                          <td>{{ $pay->comment }}</td>
                                          <td>
                                              @if($pay->date == date('Y-m-d') && $pay->check_status != 2 && $pay->in_out_status != 0)
                                                  <button data-id="{{ $pay->id }}" type="button" class="btn btn-sm text-danger btnDelete"  data-bs-toggle="modal" data-bs-target="#modalTop" ><i class="bx bx-trash me-1"></i></button>
                                              @else

                                              @endif
                                          </td>
                                      </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-3">
        <div class="modal modal-top fade" id="modalTop" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="confirmForm" >
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">Eslatma!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Siz rostdan ham ushbu elementni o'chirasizmi!</p>
                        <input type="hidden" id="branchId" >
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Tasdiqlash</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Bekor Qilish
                        </button>
                    </div>
                </form>
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

            $('.btnDelete').on('click', function (e){
                e.preventDefault();
                elemtID = $(this).data('id');
                $("#confirmForm").attr('action', elemtID);
            })
        });
    </script>
@endsection

