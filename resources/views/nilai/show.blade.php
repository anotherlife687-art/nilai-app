@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Detail Nilai
    </div>

    <div class="card-body">
        <p><strong>Nama Siswa:</strong> {{ $nilai->siswa->nama }}</p>
        <p><strong>Kelas:</strong> {{ $nilai->siswa->kelas }}</p>
        <p><strong>Mapel:</strong> {{ $nilai->mapel }}</p>
        <p><strong>Nilai:</strong> {{ $nilai->nilai }}</p>

        <a href="{{ route('nilai.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>
</div>

@endsection