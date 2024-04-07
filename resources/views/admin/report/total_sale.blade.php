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
                                    <h5 class="card-header">Savdolar Ro'yxati</h5>
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
                                        <form method="POST" action="{{ route('adminreports.total_sale_filtr') }}">
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
                                                <div class="col-sm-3 mb-3">
                                                    <button type="submit" class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="confirm"> <i class="bx bxs-filter-alt"></i> </button>
                                                    <button type="reset" class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="reset"> <i class="bx bx-trash"></i> </button>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table-striped datatable " style="font-size: 10px">
                                            <thead class="table-light ">
                                            <tr>
                                                <th>№</th>
                                                <th>Filiali</th>
                                                <th>Sanasi</th>
                                                <th>Invoice №</th>
                                                <th>Jami Savdo</th>
                                                <th>Chegirma (%)</th>
                                                <th>Chegirma Qiymati</th>
                                                <th>Sotish Narxi</th>
                                                <th>Kim Tomonidan Kelgan</th>
                                                <th>Mijoz</th>
                                                <th>Mijoz Telofoni</th>
                                                <th>Mijoz Manzili</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                            @foreach($totalSaleAll as $sale)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $sale->branch->name }}</td>
                                                    <td>{{ \Illuminate\Support\Carbon::create( $sale->created_at)->format('d-M-Y') }}</td>
                                                    <td>
                                                        <span class="badge bg-primary">№ {{ $sale->sales_order }}</span>
                                                    </td>
                                                    <td>{{ number_format($sale->total_sales, 0, '.', ' ') }}</td>
                                                    <td>{{ $sale->discount != 0 ? number_format($sale->discount, 0, '.', ' '). '%' : '-' }}</td>
                                                    <td>{{ $sale->discount != 0 ? number_format($sale->total_sales*$sale->discount/100, 0, '.', ' ') : '-' }}</td>
                                                    <td>{{ number_format( $sale->final_sales, 0, '.', ' ') }}</td>
                                                    <td>{{ $sale->caller ? $sale->caller->name : '-' }}</td>
                                                    @if($sale->client)
                                                        <td>{{ $sale->client->full_name }}</td>
                                                        <td>{{ $sale->client->phone1 }},  {{ $sale->client->phone2 }}</td>
                                                        <td>{{ $sale->client->address }}</td>
                                                    @else
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    @endif


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

