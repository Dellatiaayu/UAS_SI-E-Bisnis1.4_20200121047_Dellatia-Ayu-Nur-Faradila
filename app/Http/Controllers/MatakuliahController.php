<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = Matakuliah::all();
        $matkul->toArray();
        return view('Matakuliah.tablematkul', compact('matkul'));
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
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);
 
        $data = new Matakuliah();
 
        $data->nama_matakuliah = $request->nama_matakuliah;
        $data->sks = $request->sks;
 
        $data->save();

        return redirect('Matakuliah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $data = Matakuliah::where('id', $id,)->first();
        return view('Matakuliah.tablematkul', ['matakuliah'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'nullable',
            'sks' => 'nullable',
        ]);
        Matakuliah::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);
        return redirect('/Matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliah::find($id)->delete();
        return redirect('Matakuliah');
    }
}
