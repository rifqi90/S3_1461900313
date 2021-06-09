<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class guruController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', '=', "{$request->cari}");
        })->paginate(5);

        $guru->appends($request->only('cari'));

        return view('guru.index', [
            'guru' => $guru,
        ])
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required',
            'tahun_terbit' => 'required',
        ]);

        Buku::create($request->all());

        return redirect()
                ->route('buku.index')
                ->with('success','Buku created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'        => 'required',
            'tahun_terbit' => 'required',
        ]);

        $buku->update($request->all());

        return redirect()
                ->route('buku.index')
                ->with('success','Buku updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
                ->with('success','Buku deleted successfully');
    }
}