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
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="card-title mb-0">Data Bebas Pustaka</h2>
                <p class="mb-0">Berikut adalah data mahasiswa yang telah mendapatkan surat bebas perpustakaan.</p>
            </div>
            <div>
                <a href="{{ route('Bebas-Perpus-create') }}" class="btn btn-primary buttom-radius">Tambah Data</a>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mg-b-0 display" id="example">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bebasPerpus as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name ?? '-' }}</td>
                            <td>{{ $item->nim ?? '-' }}</td>
                            <td>
                                <div class="btn-icon-list d-flex flex-wrap justify-content-center">
                                    <a href="{{ route('skripsi-create', $item->id) }}" class="btn btn-info btn-sm btn-icon mr-1 buttom-radius">
                                        <i class="typcn typcn-eye"></i>
                                    </a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm btn-icon buttom-radius">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection