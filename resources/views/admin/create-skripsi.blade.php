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
    <div>
    @if(!$student->skripsi->isEmpty())
        <a href="{{ route('cetak-bebas-perpus', $student->id) }}" target="_blank" class="btn btn-warning buttom-radius btn-with-icon">
            <i class="typcn typcn-printer"></i> Cetak
        </a>
    @endif
    </div>
</div>

    <hr>
    <div class="card-body">
        <div class="az-content-label mg-b-5">Dasa Mahasiswa</div>
        <p class="mg-b-20">Informasi Tentang Mahasiswa/i Yang dipilih.</p>
        
            <div class="row row-sm">
                <div class="col-lg">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" value="{{ $student->nim }}" readonly name="nim">
                </div> 
                <div class="col-lg">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control " id="name" value="{{ $student->name }}" readonly name="name">
                </div>
            </div>
            <div class="row row-sm mt-3">
                <div class="col-lg">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $student->email }}" readonly name="email">
                </div>
                <div class="col-lg">
                    <label for="phone">No. Telepon</label>
                    <input type="text" class="form-control" id="phone" value="{{ $student->phone_number }}" readonly name="phone">
                </div>
            </div>
            <div class="row row-sm mt-3">
                <div class="col-lg">
                    <label for="date_of_birth">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="date_of_birth" readonly name="date_of_birth">
                </div>
                <div class="col-lg">
                    <label for="department">Jurusan</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" readonly value="{{ $student->department }}">
                </div>
            </div>
            <hr>
            @if($student->skripsi->isEmpty())
                <p class="text-danger">Mahasiswa ini belum memiliki data skripsi.</p>
                <form action="{{ route('skripsi-store', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="az-content-label mg-b-5">Form Skripsi</div>
                <p class="mg-b-20">Input Data Skripsi Harus Sesuai.</p>
                <div class="row row-sm">
                    <div class="col-lg">
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <label for="judul">Judul Skripsi</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}" name="judul" placeholder="Masukkan Judul Skripsi">
                        @error('judul')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <label for="jalur_lulus">Jalur Lulus</label>
                        <select class="form-control @error('jalur_lulus') is-invalid @enderror" id="jalur_lulus" name="jalur_lulus">
                            <option value="" disabled selected>-- Pilih Jalur Lulus --</option>
                            @foreach ($jalurLulus as $jalur)
                                <option value="{{ $jalur->name }}">{{ $jalur->name }}</option>
                            @endforeach
                        </select>
                        @error('jalur_lulus')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}" placeholder="Masukkan Tahun Skripsi" min="4" max="{{ date('Y') }}">
                        @error('tahun')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3" placeholder="Masukkan Catatan"></textarea>
                        @error('catatan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary buttom-radius">Simpan Data</button>
                    </div>
                </div>
            </form>
            @else
                <div class="az-content-label mg-b-5">Data Skripsi</div>
                <p class="mg-b-20">Informasi Skripsi Mahasiswa/i.</p>
                <div class="row row-sm">
                    <div class="col-lg">
                        <label for="judul">Judul Skripsi</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $skripsi->judul }}" readonly>
                        @error('judul')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg">
                        <label for="jalur_lulus">Jalur Lulus</label>
                        <input type="text" class="form-control @error('jalur_lulus') is-invalid @enderror" id="jalur_lulus" name="jalur_lulus" value="{{ $skripsi->jalur_lulus }}" readonly>
                        @error('jalur_lulus')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ $skripsi->tahun }}" readonly>
                        @error('tahun')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row row-sm mt-3"> 
                    <div class="col-lg">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3" readonly>{{ $skripsi->catatan }}</textarea>
                        @error('catatan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif
    </div>
</div>  
@endsection