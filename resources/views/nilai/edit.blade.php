@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">Edit Nilai</div>

    <div class="card-body">
        <form action="{{ route('nilai.update',$nilai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Siswa</label>
                <select name="siswa_id" class="form-control">
                    @foreach($siswas as $s)
                        <option value="{{ $s->id }}"
                            {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Mapel</label>
                <input type="text" name="mapel"
                       class="form-control"
                       value="{{ $nilai->mapel }}">
            </div>

            <div class="mb-3">
                <label>Nilai</label>
                <input type="number" name="nilai"
                       class="form-control"
                       value="{{ $nilai->nilai }}">
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection