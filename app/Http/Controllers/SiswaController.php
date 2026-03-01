<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
   public function index(Request $request)
{
    $query = Siswa::query();

    // SEARCH
    if ($request->search) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nis', 'like', '%' . $request->search . '%');
    }

    // PAGINATION (5 data per halaman)
    $siswas = $query->paginate(5);

    return view('siswa.index', compact('siswas'));
}

    public function show(Siswa $siswa)
    {
        $siswa->load('nilais'); // ambil relasi nilai
        return view('siswa.show', compact('siswa'));
    }

    public function create()
{
    return view('siswa.create');
}

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|min:3',
        'kelas' => 'required',
        'nis' => 'required|unique:siswas,nis'
    ]);

    Siswa::create($request->all());

    return redirect()->route('siswa.index')
        ->with('success','Data siswa berhasil ditambahkan');
}

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

   public function update(Request $request, Siswa $siswa)
{
    $request->validate([
        'nama' => 'required|min:3',
        'kelas' => 'required',
        'nis' => 'required|unique:siswas,nis,'.$siswa->id
    ]);

    $siswa->update($request->all());

    return redirect()->route('siswa.index')
        ->with('success','Data siswa berhasil diupdate');
}

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}