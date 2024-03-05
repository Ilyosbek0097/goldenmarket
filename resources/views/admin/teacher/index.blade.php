@extends('layouts.mydashboard')
@section('title', 'Teachers')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <a href="{{ route('teachers.create') }}" class="btn btn-primary"><i class="bx bx-plus align-middle" style="font-size: 26px"></i> Yangi Qo'shish</a>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                                        <h5 class="card-header">Filiallar Ro'yxati</h5>
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
                                            <table class="table">
                                                <thead class="table-light ">
                                                <tr>
                                                    <th>№</th>
                                                    <th>Ismi</th>
                                                    <th>Familyasi</th>
                                                    <th>Telefon Raqami</th>
                                                    <th>Ma'lumoti</th>
                                                    <th>Surati</th>
                                                    <th class="text-center">Amallar</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                @foreach($teachers as $teacher)
                                                    <tr>
                                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                                        <td>{{ $teacher->first_name }}</td>
                                                        <td>{{ $teacher->last_name }}</td>
                                                        <td>{{ $teacher->phone }}</td>
                                                        <td>{{ $teacher->degree }}</td>
                                                        <td>
                                                            <img src="/site/images/{{ $teacher->image}}" class="img-thumbnail" width="60">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-success btn-sm" href="{{ route('teachers.show',$teacher->id ) }}"><i class="bx bx-show me-1"></i> Ko'rish</a>
                                                            <a class="btn btn-info btn-sm" href=" {{ route('teachers.edit', $teacher->id) }}"><i class="bx bx-edit-alt me-1"></i> Tahrirlash</a>
                                                            <button data-id="{{ $teacher->id }}" type="button" class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#modalTop" ><i class="bx bx-trash me-1"></i> O'chirish</button>
                                                        </td>
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
            $('.btnDelete').on('click', function (e){
                e.preventDefault();
               elemtID = $(this).data('id');
               $("#confirmForm").attr('action', 'teachers/'+elemtID);
            })
        });
    </script>
@endsection
