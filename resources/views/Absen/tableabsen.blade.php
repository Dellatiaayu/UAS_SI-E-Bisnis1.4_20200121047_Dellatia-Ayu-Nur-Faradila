@extends("../../../Template/main")

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Absen</h4>
                    <div class="table-responsive">
                        <form action="/Absen" method="post">
                            @csrf
                            @method('post')
                            <div class="row d-flex">
                                <input type="text" value="{{now()}}" hidden name="waktu_absen">
                                <div class="col">
                                        <select name="nama_mahasiswa" class="form-control" aria-label="Default select example">
                                            <option disabled selected>Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $data ) 
                                            <option value="{{$data->id}}">{{$data->nama_mahasiswa}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col">
                                    <select name="nama_matakuliah" class="form-control" aria-label="Default select example">
                                        <option disabled selected>Pilih Mata Kuliah</option>
                                        @foreach ($matakuliah as $data ) 
                                        <option value="{{$data->id}}">{{$data->nama_matakuliah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="ket" class="form-control" aria-label="Default select example">
                                        <option disabled selected>Keterangan</option>
                                        <option value="hadir">Hadir</option>
                                        <option value="tidak hadir">Tidak Hadir</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn mb-1 btn-primary">Submit</button>
                            </div>
                        </form>
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Waktu Absen</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Mata kuliah</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absen as $data )
                                <tr>
                                    <th>{{$data->id}}</th>
                                    <td>{{$data->waktu_absen}}</td>
                                    <td>{{$data->mahasiswa->nama_mahasiswa}}</td>
                                    <td>{{$data->matakuliah->nama_matakuliah}}</td>
                                    <td>{{$data->ket}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection