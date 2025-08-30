@extends('layout.main')
@section('content')
<div class="az-dashboard-one-title">
    <ul class="az-content-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (!$loop->last)
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                @else
                    {{ $breadcrumb['label'] }}
                @endif
            </li>
        @endforeach
    </ul>
</div>
<div class="card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="card-title mb-0">{{ $title }}</h2>
                <p class="mb-0">{{ $description }}</p>
            </div>
        </div>
    <div class="card-body">
        <form action="{{ route('Bebas-Perpus-store') }}" method="POST">
            @csrf
            <div class="row row-sm">
                <div class="col-lg">
                    <label for="nim">NIM</label>
                    <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{ old('nim') }}" name="nim" placeholder="Masukkan NIM">
                    @error('nim')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="Masukkan Nama">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row row-sm mt-3">
                <div class="col-lg">
                    <label for="email">email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="Masukkan email Skripsi">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukkan No. Telepon">
                    @error('phone')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row row-sm mt-3">
                <div class="col-lg">
                    <label for="department">Jurusan</label>
                    <select class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}" phone id="department" name="department">
                        <option value="" disabled selected>-- Pilih Jurusan --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg">
                    <label for="date_of_birth">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" placeholder="Masukkan Judul date_of_birth">
                    @error('date_of_birth')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row row-sm mg-t-20">
                <div class="col-lg">
                    <button type="submit" class="btn btn-primary buttom-radius">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection