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
                                    <h5 class="card-header">Sotilgan Maxsulotlar Ro'yxati</h5>
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
                                            <form method="POST" action=" {{ route('adminreports.cash_sale_report') }}">
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
                                        <table class="table">
                                            <thead class="table-light ">
                                            <tr>
                                                <th>№</th>
                                                <th>Filiali</th>
                                                <th>Sanasi</th>
                                                <th>Nomi</th>
                                                <th>Miqdori</th>
                                                <th>Kirim UZS</th>
                                                <th>Kirim $</th>
                                                <th>Sotish Narxi</th>
                                                <th>Kim Tomonidan Kelgan</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach($cashSaleAll as $cashSale)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $cashSale->branch->name }}</td>
                                                        <td> {{ \Illuminate\Support\Carbon::create($cashSale->created_at)->format('d-M-Y') }}</td>
                                                        <td> {{ $cashSale->product->type->type_name }} {{ $cashSale->product->brand->brand_name }} {{ $cashSale->product->model_name }}</td>
                                                        <td> {{ $cashSale->amount }}</td>
                                                        <td> {{ number_format($cashSale->body_price_uzs, 0, '.', ' ') }}</td>
                                                        <td>$ {{ number_format($cashSale->body_price_usd, 2, '.', ' ') }}</td>
                                                        <td> {{ number_format($cashSale->sales_price, 0, '.', ' ') }}</td>
                                                        <td>{{ $cashSale->totalSale ? $cashSale->totalSale->caller->name : '' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination justify-content-end mt-3 mb-3">
                                        </div>

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

