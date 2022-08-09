<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        $jadwal->toArray();
        return view('Jadwal.tablejadwal', compact('jadwal'));
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
            'jadwal' => 'required|unique:jadwals|max:255',
            'matakuliah_id' => 'required',
        ]);
 
        $data = new Jadwal();
 
        $data->jadwal = $request->jadwal;
        $data->matakuliah_id = $request->matakuliah_id;
 
        $data->save();

        return redirect('Jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $data = Jadwal::where('id', $id,)->first();
        return view('Jadwal.tablejadwal', ['jadwal'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jadwal' => 'nullable',
            'matakuliah_id' => 'nullable',
        ]);
        Jadwal::find($id)->update([
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);
        return redirect('/Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();
        return redirect('Jadwal');
    }
}
