@extends('layouts.mydashboard')
@section('title', 'Report')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="row">
{{--                            <div class="col-lg-12 text-end">--}}
{{--                                <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>--}}
{{--                            </div>--}}
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <h5 class="card-header">Hisobotlar</h5>
                                    <div class="row m-1">
                                        <div class="col-md-12">
                                            <div class="nav-align-top mb-4">
                                                <ul class="nav nav-pills mb-3" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#one" aria-controls="navs-pills-top-home" aria-selected="true">Ombordagi Maxsulotlar</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#two" aria-controls="navs-pills-top-profile" aria-selected="false" tabindex="-1">Qo'shilgan Tovarlar</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#three" aria-controls="navs-pills-top-messages" aria-selected="false" tabindex="-1">Sotilgan Maxsulotlar</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" id="four_block" data-bs-target="#four" aria-controls="navs-pills-top-four" aria-selected="false" tabindex="-1">Kassa</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="one" role="tabpanel">
                                                       <table  class="table-striped reportTable">
                                                           <thead>
                                                            <tr>
                                                                <th>№</th>
                                                                <th>Filiali</th>
                                                                <th>Nomi</th>
                                                                <th>Miqdori</th>
                                                                <th>Natsenkasi</th>
                                                                <th>Kirim UZS</th>
                                                                <th>Kirim $</th>
                                                                <th>Sotish Narxi</th>
                                                            </tr>
                                                           </thead>
                                                           <tbody>
                                                                @foreach($product_all as $product)
                                                                    @if($product->branch_id == auth()->user()->branch_id)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $product->branch->name }}</td>
                                                                            <td>{{ $product->productname->type->type_name }} {{ $product->productname->brand->brand_name }} {{ $product->productname->model_name }}</td>
                                                                            <td>{{ $product->amount }}</td>
                                                                            <td>{{ $product->mark->value }} %</td>
                                                                            <td>{{ number_format($product->body_price_uzs, 0, '.', ' ') }} UZS</td>
                                                                            <td>$ {{ $product->body_price_usd }}</td>
                                                                            <td>{{ number_format($product->sales_price, 0, '.', ' ') }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach

                                                           </tbody>
                                                       </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="two" role="tabpanel">
                                                           <div class="row">
                                                               <div class="col-sm-3">
                                                                   <label class="form-label-sm" for="first_date">Sanadan</label>
                                                                   <input type="date" id="first_date" name="first_date" class="form-control form-control-sm">
                                                               </div>
                                                               <div class="col-sm-3">
                                                                   <label class="form-label-sm" for="last_date">Sanagacha</label>
                                                                   <input type="date" id="last_date" name="last_date" class="form-control form-control-sm">
                                                               </div>
                                                               <div class="col-sm-3 mb-3">
                                                                   <button class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="filtr"> <i class="bx bxs-filter-alt"></i> </button>
                                                                   <button class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="clear"> <i class="bx bx-trash"></i> </button>
{{--                                                                   <a href="{{ route('reports.export_add_product') }}" class="btn btn-light btn-sm mt-4" title="Export"> <i class="bx bx-export"></i> </a>--}}
                                                               </div>
                                                           </div>
                                                        <table class="table-striped table-bordered" id="add_product_table" style="font-size: 12px;">
                                                            <thead>
                                                                <tr>
                                                                    <th>№</th>
                                                                    <th>Filiali</th>
                                                                    <th>Sanasi</th>
                                                                    <th>Nomi</th>
                                                                    <th>Miqdori</th>
                                                                    <th>Natsenkasi</th>
                                                                    <th>Kirim UZS</th>
                                                                    <th>Kirim $</th>
                                                                    <th>Sotish Narxi</th>
                                                                    <th>Contragent</th>
                                                                    <th>Xodim</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="three" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label class="form-label-sm" for="from_date">Sanadan</label>
                                                                <input type="date" id="from_date" name="from_date" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="form-label-sm" for="to_date">Sanagacha</label>
                                                                <input type="date" id="to_date" name="to_date" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-sm-3 mb-3">
                                                                <button class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="confirm"> <i class="bx bxs-filter-alt"></i> </button>
                                                                <button class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="reset"> <i class="bx bx-trash"></i> </button>
                                                            </div>
                                                            <div class="row">
                                                                <table class="table-bordered table-striped text-center" style="font-size: 12px;" id="cashSaleTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>№</th>
                                                                            <th>Filiali</th>
                                                                            <th>Sanasi</th>
                                                                            <th>Nomi</th>
                                                                            <th>Miqdori</th>
                                                                            <th>Kirim $</th>
                                                                            <th>Kirim UZS</th>
                                                                            <th>Sotish Narxi</th>
                                                                            <th>Xodim</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="four" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label class="form-label-sm" for="one_date">Sanadan</label>
                                                                <input type="date" id="one_date" name="one_date" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="form-label-sm" for="two_date">Sanagacha</label>
                                                                <input type="date" id="two_date" name="two_date" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-sm-3 mb-3">
                                                                <button class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="filtr_btn"> <i class="bx bxs-filter-alt"></i> </button>
                                                                <button class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="clear_btn"> <i class="bx bx-trash"></i> </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="text-nowrap">
                                                                    <h6 class="text-center">Jami Kassa Hisoboti</h6>
                                                                    <ul class="p-0 m-0">
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <img src="{{ asset('../assets/img/icons/unicons/cc-success.png') }}" alt="User" class="rounded">
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Plastik</small>
                                                                                    <h6 class="mb-0">Jami Plastik Tushum</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-warning" id="total_plastik_sales"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <img src="{{ asset('../assets/img/icons/unicons/wallet.png') }}" alt="User" class="rounded">
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Naqd</small>
                                                                                    <h6 class="mb-0">Jami Naqd Tushum</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-success" id="total_cash_sales"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <img src="{{ asset('../assets/img/icons/unicons/chart.png') }}" alt="User" class="rounded">
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Inkassa</small>
                                                                                    <h6 class="mb-0">Naqd</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-success" id="transfer_cash"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <img src="{{ asset('../assets/img/icons/unicons/chart.png') }}" alt="User" class="rounded">
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Inkassa</small>
                                                                                    <h6 class="mb-0">Plastik</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-warning" id="transfer_plastik"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-warning p-2"><i class="bx bx-wallet text-danger"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Chiqim</small>
                                                                                    <h6 class="mb-0">Naqd</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-success" id="output_cash"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-warning p-2"><i class="bx bx-credit-card text-danger"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Chiqim</small>
                                                                                    <h6 class="mb-0">Plastik</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-warning" id="output_plastik"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-secondary p-2"><i class="bx bx-wallet text-warning"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Tasdiqlanmagan</small>
                                                                                    <h6 class="mb-0">Naqd</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-success" id="load_cash"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-secondary p-2"><i class="bx bx-credit-card text-warning"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Tasdiqlanmagan</small>
                                                                                    <h6 class="mb-0">Plastik</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-warning" id="load_plastik"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex mb-4 pb-1">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-info p-2"><i class="bx bx-credit-card text-info"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Kassa Qoldiq</small>
                                                                                    <h6 class="mb-0">Plastik</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-warning" id="cash_plastik"></h6> <span class="text-muted">USD</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex">
                                                                            <div class="avatar flex-shrink-0 me-3">
                                                                                <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                                                            </div>
                                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                                <div class="me-2">
                                                                                    <small class="text-muted d-block mb-1">Kassa Qoldiq</small>
                                                                                    <h6 class="mb-0">Naqd</h6>
                                                                                </div>
                                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                                    <h6 class="mb-0 text-success" id="cash_pay"></h6> <span class="text-muted">UZS</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="confirmForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">Eslatma!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Siz rostdan ham ushbu elementni o'chirasizmi!</p>
                        <input type="hidden" id="branchId" name="id" >
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="submit_remove">Tasdiqlash</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){


            $(".reportTable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'csv', 'pdf', 'copy', 'print'
                ],
                "language": {
                    "search": "Qidirish: ",
                    "info": "Ko'rsatilyapti _START_ dan _END_ gacha _TOTAL_ ta qatordan",
                    "processing": "Yuklanyapti...",
                    "zeroRecords": "Ma'lumotlar Topilmadi!",
                    "lengthMenu": "Ko'rish _MENU_ qator",
                    "paginate": {
                        "first": "Birinchisi",
                        "last": "Oxirgisi",
                        "next": ">",
                        "previous": "<"
                    },
                },
                processing: true,
                responsive: true,
                ordering: false,
            });
            load_date();
            function load_date(first_date = '', last_date = '' )
            {
                $("#add_product_table").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('reports.add_product_report') }}',
                        data: {
                            first_date: first_date,
                            last_date: last_date
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    "language": {
                        "search": "Qidirish: ",
                        "info": "Ko'rsatilyapti _START_ dan _END_ gacha _TOTAL_ ta qatordan",
                        "processing": "Yuklanyapti...",
                        "zeroRecords": "Ma'lumotlar Topilmadi!",
                        "lengthMenu": "Ko'rish _MENU_ qator",
                        "paginate": {
                            "first": "Birinchisi",
                            "last": "Oxirgisi",
                            "next": ">",
                            "previous": "<"
                        },
                    },
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                        {
                              data: 'branch_name',
                              name: 'branch_name'
                        },
                        {
                            data: 'register_date',
                            name: 'register_date'
                        },
                        {
                            data: 'product_name',
                            name: 'product_name'
                        },
                        {
                            data: 'amount',
                            name: 'amount'
                        },
                        {
                            data: 'mark',
                            name: 'mark'
                        },
                        {
                            data: 'body_price_uzs',
                            name: 'body_price_uzs'
                        },
                        {
                            data: 'body_price_usd',
                            name: 'body_price_usd'
                        },
                        {
                            data: 'sales_price',
                            name: 'sales_price'
                        },
                        {
                            data: 'supplier',
                            name: 'supplier'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },

                    ]
                });
            }
            load_cash_sale();
            function load_cash_sale(from_date = '', to_date = '')
            {

                $("#cashSaleTable").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('reports.cash_sales_report') }}',
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    "language": {
                        "search": "Qidirish: ",
                        "info": "Ko'rsatilyapti _START_ dan _END_ gacha _TOTAL_ ta qatordan",
                        "processing": "Yuklanyapti...",
                        "zeroRecords": "Ma'lumotlar Topilmadi!",
                        "lengthMenu": "Ko'rish _MENU_ qator",
                        "paginate": {
                            "first": "Birinchisi",
                            "last": "Oxirgisi",
                            "next": ">",
                            "previous": "<"
                        },
                    },
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'branch_name',
                            name: 'branch_name'
                        },
                        {
                            data: 'register_date',
                            name: 'register_date'
                        },
                        {
                            data: 'product_name',
                            name: 'product_name',
                        },
                        {
                            data: 'amount',
                            name: 'amount'
                        },
                        {
                            data: 'body_price_usd',
                            name: 'body_price_usd'
                        },
                        {
                          data: 'body_price_uzs',
                          name: 'body_price_uzs'
                        },
                        {
                          data: 'sales_price',
                          name: 'sales_price'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        }
                    ]
                });
            }
        $(document).on('click', '#confirm', function(e){
          e.preventDefault();
          let from_date = $('#from_date').val();
          let to_date = $('#to_date').val();

          if(from_date != '' && to_date != '')
          {
              $('#cashSaleTable').DataTable().destroy();
              load_cash_sale(from_date, to_date);
          }
          else{
              Swal.fire({
                  title: 'Diqqat',
                  text: 'Sanalarni Tanlang!',
                  icon: 'warning',
                  showConfirmButton: false,
                  timer: 1500
              });
          }
        });
        $(document).on('click', '#reset', function (e) {
            e.preventDefault();
            $('#from_date').val('');
            $('#to_date').val('');
            $('#cashSaleTable').DataTable().destroy();
            load_cash_sale();
        });



        $(document).on('click', '#clear', function(e){
             e.preventDefault();
             $('#first_date').val('');
             $('#last_date').val('');
            $('#add_product_table').DataTable().destroy();
            load_date();

         });
        $(document).on('click', '#filtr', function(e){
           e.preventDefault();
           let first_date = $("#first_date").val();
           let last_date = $("#last_date").val();
           if(first_date != '' && last_date != '')
           {
               $('#add_product_table').DataTable().destroy();
               load_date(first_date, last_date);
           }
           else{
                Swal.fire({
                    title: 'Diqqat',
                    text: 'Sanalarni Tanlang!',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                });
           }
        });
        var one_date = $("#one_date").val();
        var two_date = $("#two_date").val();
        function load_pay_list(one_date = '', two_date = '')
        {
            $.ajax({
                url: "{{ route('reports.pay_list_report') }}",
                method: "POST",
                data: {
                    one_date: one_date,
                    two_date: two_date,
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $("#total_plastik_sales").text(response.plastik_kirim);
                    $("#total_cash_sales").text(response.naqd_kirim);

                    $("#output_plastik").text(response.plastik_chiqim);
                    $("#output_cash").text(response.naqd_chiqim);

                    $("#transfer_cash").text(response.naqd_inkassa);
                    $("#transfer_plastik").text(response.plastik_inkassa);

                    $("#load_cash").text(response.load_naqd);
                    $("#load_plastik").text(response.load_plastik)

                    $("#cash_pay").text(response.kassa_naqd);
                    $("#cash_plastik").text(response.kassa_plastik);


                },
                error: function (xhr, status, error) {
                    console.error('Xato ro\'y berdi:', error);
                }
            });
        }
        $(document).on('click', '#four_block',  function(){

            if(one_date == '' && two_date == '')
            {
                load_pay_list(one_date, two_date);
            }
        });

        $(document).on('click', "#filtr_btn", function(){
            let one_date = $("#one_date").val();
            let two_date = $("#two_date").val();
          if(one_date != '')
          {
              load_pay_list(one_date, two_date);
          }
          else{
              Swal.fire({
                  title: 'Diqqat',
                  text: 'Sanalarni Tanlang!',
                  icon: 'warning',
                  showConfirmButton: false,
                  timer: 1500
              });
          }
        });




        });
    </script>
@endsection

