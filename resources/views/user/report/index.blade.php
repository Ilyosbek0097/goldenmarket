@extends('layouts.mydashboard')
@section('title', 'Product Brand')
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
                                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#three" aria-controls="navs-pills-top-messages" aria-selected="false" tabindex="-1">Messages</button>
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
                                                       <form action="">
                                                           <div class="row">
                                                               <div class="col-sm-3">
                                                                   <label class="form-label-sm" for="first_date">Sanadan</label>
                                                                   <input type="date" id="first_date" name="first_date" class="form-control form-control-sm">
                                                               </div>
                                                               <div class="col-sm-3">
                                                                   <label class="form-label-sm" for="last_date">Sanagacha</label>
                                                                   <input type="date" id="last_date" name="last_date" class="form-control form-control-sm">
                                                               </div>
                                                               <div class="col-sm-3">
                                                                   <button class="btn btn-primary btn-sm mt-4" title="Filtrlash Tugmasi" id="filtr"> <i class="bx bxs-filter-alt"></i> </button>
                                                                   <button class="btn btn-danger btn-sm mt-4" title="Tozalash Tugmasi" id="clear"> <i class="bx bx-trash"></i> </button>
                                                               </div>
                                                           </div>
                                                       </form>
                                                        <table class="table-striped" id="add_product_table" style="font-size: 12px;">
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
                                                        <p>
                                                            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                                                            bears
                                                            cake chocolate.
                                                        </p>
                                                        <p class="mb-0">
                                                            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                                                            sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                                                            jelly.
                                                        </p>
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
                    // dom: 'Bfrtip',
                    // buttons: [
                    //     'print',
                    //     'pdf',
                    //     'word'
                    // ],
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


        });
    </script>
@endsection

