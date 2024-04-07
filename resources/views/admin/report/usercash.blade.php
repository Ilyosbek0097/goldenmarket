@extends('layouts.mydashboard')
@section('title', 'Admin Report')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <h5 class="card-header">Filiallar Kassa Hisoboti</h5>
                                    <div class="table-responsive text-nowrap">
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
                                        <form method="POST" action="{{ route('adminreports.usercash_report') }}">
                                            @csrf
                                            <div class="row m-1">
                                                <div class="col-sm-3">
                                                    <label class="form-label-sm" for="from_date">Sanadan</label>
                                                    <input type="date" id="from_date" name="from_date" class="form-control form-control-sm @error('from_date') is-invalid @enderror">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label-sm" for="to_date">Sanagacha</label>
                                                    <input type="date" id="to_date" name="to_date" class="form-control form-control-sm @error('to_date') is-invalid @enderror">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label-sm" for="branch">Filial</label>
                                                    <select name="branch" id="branch" class="form-control form-label-sm select2">
                                                        <option value="0">Barchasi</option>
                                                        @foreach($branchAll as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <button type="submit" class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="confirm"> <i class="bx bxs-filter-alt"></i> </button>
                                                    <button type="reset" class="btn btn-warning btn-sm mt-4" title="Tozalash Tugmasi" id="reset"> <i class="bx bx-trash"></i> </button>
                                                    <a  class="btn btn-danger btn-sm mt-4" href="{{ route('adminreports.usercash') }}"> <i class="bx bx-refresh"></i> </a>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table-striped datatable" style="font-size: 12px">
                                            <thead class="table-light ">
                                            <tr>
                                                <th>№</th>
                                                <th>Sana</th>
                                                <th>Summa Turi</th>
                                                <th>Summa</th>
                                                <th>Turi</th>
                                                <th>Sababi</th>
                                                <th>Izoxi</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                            @foreach($cashAll as $pay)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pay->date }}</td>
                                                    <td> <span class="badge bg-{{ $pay->pay_type == 'naqd' ? 'success' : 'warning'  }}"> {{ $pay->pay_type }}</span></td>
                                                    <td>{{ number_format($pay->pay_sum, 0, '.', ' ') }}</td>
                                                    <td><span class="badge bg-label-{{ $pay->in_out_status == 1 ? 'danger' : 'success' }}">{{ $pay->in_out_status == 1 ? 'Chiqim' : 'Kirim' }}</span> </td>
                                                    <td>{{ $pay->outputtype ? $pay->outputtype->name : 'Kirim Qilindi' }}</td>
                                                    <td>{{ $pay->comment}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#confirm',  function(e) {
                e.preventDefault();
                let fromDate = $('#from_date').val();
                let toDate = $('#to_date').val();
                if(fromDate == '' || toDate =='')
                {

                    Swal.fire({
                        title: 'Diqqat',
                        text: "Sanalarni To'ldiring",
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }
                else{
                    this.form.submit();
                }
            });
        });
    </script>
@endsection

