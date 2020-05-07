<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mahasiswa = Mahasiswa::latest()->paginate(5); //paginate mengatur banyak data yg tampil dlm 1 hal
        return view('mahasiswa.index',compact('mahasiswa')); //nilai dlm compact adl variabel utk passing
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.create',compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([ //validasi, required artinya harus diisi
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'alamat_tinggal' => 'required',
            'no_hp' => 'required',
        ]);

        Mahasiswa::create($request->all()); //Menyimpan data ke dalam database
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil disimpan.'); //Membuat session sementara berisi pesan
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
        return view('mahasiswa.show',compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        request()->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'alamat_tinggal' => 'required',
            'no_hp' => 'required',
        ]);

        $mahasiswa->update($request->all());
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil diperbarui.');
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $mahasiswa->delete();
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil dihapus.');
        return redirect()->route('mahasiswa.index');
    }
}
