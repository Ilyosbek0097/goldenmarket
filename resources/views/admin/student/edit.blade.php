@extends('layouts.mydashboard')
@section('title', 'Student Update')
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
                        <h5 class="mb-0">O'quvchi Ma'lumotlarini Tahrirlash</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="first_name">Ismi</label>
                                <input type="text" value="{{ $student->first_name }}" id="name" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  placeholder="Ismini kiriting...">
                                @error('first_name')
                                <div class="mt-2 text-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="last_name">Familyasi</label>
                                <input type="text" value="{{ $student->last_name }}" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  placeholder="Familyasini Kiriting...">
                                @error('last_name')
                                    <div class="mt-2 text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="date_of_birth">Tug'ilgan Kuni</label>
                                <input type="date" value="{{ $student->date_of_birth }}" id="date_of_birth" name="date_of_birth" class="form-control phone-mask @error('date_of_birth') is-invalid @enderror">
                                @error('phone')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">Telefon Raqami</label>
                                <input type="text" value="{{ $student->phone }}" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="91 123 45 67">
                                @error('phone')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="hidden" value="{{ $student->student_code }}" id="student_code" name="student_code">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="branch_id">Filiali</label>
                                <select id="branch_id" name="branch_id" class="form-control @error('branch_id') is-invalid @enderror">
                                    <option disabled>--- Filialini Tanlang ---</option>
                                    @foreach($branchs as $branch)
                                        <option value="{{$branch->id}}" @if($student->branch_id == $branch->id) selected @endif>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="mt-2 text-danger">
                                    {{ $message}}
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
                                            background-size: cover;background-image: url('/site/images/{{$student->image}}');">
                                            <p class="text-center text-danger">Yuklanayotgan Rasm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tasdiqlash</button>
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
