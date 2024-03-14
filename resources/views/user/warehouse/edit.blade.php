@extends('layouts.mydashboard')
@section('title', 'Branch Update')
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
                        <h5 class="mb-0">Filialni Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('branchs.update', $branchOne->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="name">Filial Nomi</label>
                                <input type="text" value="{{ $branchOne->name }}" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Filial Nomini Kiriting...">
                                @error('name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">Manzili</label>
                                <input type="text" value="{{ $branchOne->address }}" id="address" name="address" class="form-control @error('address') is-invalid @enderror"  placeholder="Manzilini Kiriting...">
                                @error('address')
                                    <div class="mt-2 text-danger">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">Telefon Raqami</label>
                                <input type="text" value="{{ $branchOne->phone }}" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="91 123 45 67">
                                @error('phone')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="image">Rasmi</label>
                                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" >
                                        @error('image')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-8 float-end" id="product_image_blok" style="
                                            height: 225px;
                                            border-radius: 40px;
                                            border: 3px solid #696cff;
                                            background-position: center;
                                            background-size: cover;background-image: url('/site/images/{{$branchOne->image}}');">
                                            <p class="text-center text-danger">Yuklanayotgan Rasm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                            <a type="btn btn-danger" href="{{ url()->previous() }}" class="btn btn-danger">Bekor Qilish</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const image_input = document.querySelector("#image");
        image_input.addEventListener("change", function() {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const uploaded_image = reader.result;
                document.querySelector("#product_image_blok").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
