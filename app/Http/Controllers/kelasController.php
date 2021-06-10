<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::when($request->cari, function ($query) use ($request) {
            $query
            ->where('id', '=', "{$request->cari}");
        })->paginate(5);

        $kelas->appends($request->only('cari'));

        return view('kelas.index', [
            'kelas' => $kelas,
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
        return view('kelas.create');
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
            'id_siswa'        => 'required',
            'id_guru' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()
                ->route('kelas.index')
                ->with('success','kelas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'id_siswa'        => 'required',
            'id_guru' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()
                ->route('kelas.index')
                ->with('success','kelas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')
                ->with('success','kelas deleted successfully');
    }
}