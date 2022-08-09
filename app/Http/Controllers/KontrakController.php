<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kontrak;
use App\Models\Semester;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrak = Kontrak::all();
        $mahasiswa = Mahasiswa::all('id', 'nama_mahasiswa');
        $semester = Semester::all('id','semester');
        return view('Kontrak.tablekontrak', compact('kontrak','mahasiswa','semester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'mahasiswa_id' => 'required|unique:kontraks|',
            'semester_id' => 'required',
        ]);
 
        $data = new Kontrak();
 
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->semester_id = $request->semester_id;
 
        $data->save();

        return redirect('Kontrak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrak $kontrak)
    {
        $data = Kontrak::where('id', $id,)->first();
        return view('Kontrak.tablekontrak', ['kontrak'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'nullable',
            'semester_id' => 'nullable',
        ]);
        Kontrak::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);
        return redirect('/Kontrak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontrak::find($id)->delete();
        return redirect('Kontrak');
    }
}
