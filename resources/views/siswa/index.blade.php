@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Data Siswa</h5>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>

    <div class="card-body">

        {{-- FORM SEARCH --}}
        <form method="GET" action="{{ route('siswa.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama atau NIS..."
                       value="{{ request('search') }}">
                <button class="btn btn-outline-primary">Search</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NIS</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->nis }}</td>
                   <td>
    <a href="{{ route('siswa.show',$siswa->id) }}" 
       class="btn btn-info btn-sm">Detail</a>

    <a href="{{ route('siswa.edit',$siswa->id) }}" 
       class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('siswa.destroy',$siswa->id) }}"
          method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm"
            onclick="return confirm('Yakin hapus data?')">
            Hapus
        </button>
    </form>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center">
            {{ $siswas->withQueryString()->links() }}
        </div>

    </div>
</div>

@endsection