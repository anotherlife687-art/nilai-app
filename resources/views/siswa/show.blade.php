@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Detail Siswa
    </div>

    <div class="card-body">
        <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
        <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>

        <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-header">
        Daftar Nilai
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Mapel</th>
                    <th>Nilai</th>
                </tr>
            </thead>

            <tbody>
                @forelse($siswa->nilais as $nilai)
                <tr>
                    <td>{{ $nilai->mapel }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">
                        Belum ada nilai
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection