@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Data Nilai</h5>
        <a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>

    <div class="card-body">

        {{-- SEARCH --}}
        <form method="GET" action="{{ route('nilai.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama siswa atau mapel..."
                       value="{{ request('search') }}">
                <button class="btn btn-outline-primary">Search</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Mapel</th>
                    <th>Nilai</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($nilais as $nilai)
                <tr>
                    <td>{{ $nilai->siswa->nama }}</td>
                    <td>{{ $nilai->mapel }}</td>
                    <td>{{ $nilai->nilai }}</td>
                    <td>
                        <a href="{{ route('nilai.show',$nilai->id) }}"
                           class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('nilai.edit',$nilai->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('nilai.destroy',$nilai->id) }}"
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
                    <td colspan="4" class="text-center">
                        Data tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center">
            {{ $nilais->withQueryString()->links() }}
        </div>

    </div>
</div>

@endsection