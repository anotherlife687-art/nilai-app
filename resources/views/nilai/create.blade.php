@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        Tambah Nilai
    </div>

    <div class="card-body">

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Siswa</label>
                <select name="siswa_id" class="form-control">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}"
                            {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Mapel</label>
                <input type="text"
                       name="mapel"
                       class="form-control"
                       value="{{ old('mapel') }}">
            </div>

            <div class="mb-3">
                <label>Nilai</label>
                <input type="number"
                       name="nilai"
                       class="form-control"
                       min="0"
                       max="100"
                       value="{{ old('nilai') }}">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection