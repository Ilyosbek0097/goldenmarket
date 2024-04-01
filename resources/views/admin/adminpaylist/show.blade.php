@extends('layouts.mydashboard')
@section('title', 'CashSale Show')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bx bx-arrow-back align-middle" style="font-size: 26px"></i> Ortga Qaytish</a>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                                        <h5 class="card-header">Sotilgan Maxsulot Ma'lumotlari</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table mb-5 text-center" style="font-size: 10px">
                                                <thead>
                                                    <tr>
                                                        <th>№</th>
                                                        <th>Sana</th>
                                                        <th>Nomi</th>
                                                        <th>Miqdori</th>
                                                        <th>Narxi UZS</th>
                                                        <th>Narxi $</th>
                                                        <th>Sotish Narxi</th>
                                                        <th>Jami Sotish Narxi</th>
                                                        <th>Filiali</th>
                                                        <th>Sotgan Xodim</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach($cashsaleOne as $cashSale)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ \Illuminate\Support\Carbon::create($cashSale->created_at)->format('d-M-Y') }}</td>
                                                            <td>{{ $cashSale->product->type->type_name }} {{ $cashSale->product->brand->brand_name }} {{ $cashSale->product->model_name }}</td>
                                                            <td>{{ $cashSale->amount }}</td>
                                                            <td>{{ number_format($cashSale->body_price_uzs, 0, '.', ' ') }}</td>
                                                            <td>$ {{ number_format($cashSale->body_price_usd, 0, '.', ' ') }}</td>
                                                            <td>{{ number_format($cashSale->sales_price, 0, '.', ' ') }}</td>
                                                            <td>{{ number_format($cashSale->sales_price * $cashSale->amount, 0, '.', ' ') }}</td>
                                                            <td>{{ $cashSale->branch->name }}</td>
                                                            <td>{{ $cashSale->user->name }}</td>
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
