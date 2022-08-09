<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
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
        $mhs = Mahasiswa::all();
        $mhs->toArray();
        return view('Mahasiswa.tabledata', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required|unique:mahasiswas|',
        ]);
 
        $data = new Mahasiswa();
 
        $data->nama_mahasiswa = $request->nama_mahasiswa;
        $data->alamat = $request->alamat;
        $data->no_tlp = $request->no_tlp;
        $data->email = $request->email;
 
        $data->save();

        return redirect('Mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $data = Mahasiswa::where('id', $id,)->first();
        return view('Mahasiswa.tablemahasiswa', ['mahasiswa'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'nullable',
            'alamat' => 'nullable',
            'no_tlp' => 'nullable|numeric',
            'email' => 'nullable',
        ]);
        Mahasiswa::find($id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);
        return redirect('/Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('Mahasiswa');
    }
}
