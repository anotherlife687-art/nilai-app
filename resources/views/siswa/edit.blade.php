@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        Edit Data Siswa
    </div>

    <div class="card-body">

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama"
                       class="form-control"
                       value="{{ old('nama', $siswa->nama) }}">
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas"
                       class="form-control"
                       value="{{ old('kelas', $siswa->kelas) }}">
            </div>

            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis"
                       class="form-control"
                       value="{{ old('nis', $siswa->nis) }}">
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection