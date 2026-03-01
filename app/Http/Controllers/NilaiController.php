<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
{
    $query = Nilai::with('siswa');

    // SEARCH berdasarkan nama siswa atau mapel
    if ($request->search) {
        $query->whereHas('siswa', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        })->orWhere('mapel', 'like', '%' . $request->search . '%');
    }

    $nilais = $query->paginate(5);

    return view('nilai.index', compact('nilais'));
}

    public function show(Nilai $nilai)
    {
        $nilai->load('siswa');
        return view('nilai.show', compact('nilai'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('nilai.create', compact('siswas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'siswa_id' => 'required',
        'mapel' => 'required',
        'nilai' => 'required|integer|min:0|max:100'
    ]);

    Nilai::create($request->all());

    return redirect()->route('nilai.index')
        ->with('success','Nilai berhasil ditambahkan');
}

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        return view('nilai.edit', compact('nilai','siswas'));
    }

   public function update(Request $request, Nilai $nilai)
{
    $request->validate([
        'siswa_id' => 'required',
        'mapel' => 'required',
        'nilai' => 'required|integer|min:0|max:100'
    ]);

    $nilai->update($request->all());

    return redirect()->route('nilai.index')
        ->with('success','Nilai berhasil diupdate');
}

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index');
    }
}