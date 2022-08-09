@extends("../../../Template/main")

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mata Kuliah</h4>
                    <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matkul as $data )
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$data->nama_matakuliah}}</td>
                                    <td>{{$data->sks}}</td>
                                    <td>
                                        <div class="row">
                                        <button type="button" class="btn  btn-sm btn-primary mr-1" data-toggle="modal"     
                                        data-target="#exampleModalEdit{{$data->id}}" data-whatever="@getbootstrap">
                                        <i class="fa fa-pencil color-muted m-r-5"></i> </button>
                                        <form action="/Matakuliah/{{$data->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fa fa-close color-danger"></i> </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>

                            <!-- Edit Mata Kuliah -->
                            <div class="modal fade" id="exampleModalEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Mata Kuliah</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="Matakuliah/{{$data->id}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nama_matakuliah" class="col-form-label">Nama Mata Kuliah :</label>
                                                    <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" 
                                                    value="{{$data->nama_matakuliah}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">SKS :</label>
                                                    <input type="text" class="form-control" name="sks" id="sks" value="{{$data->sks}}">
                                                </div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit Mata Kuliah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Mata Kuliah -->
    <div class="bootstrap-modal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah Mata Kuliah</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Matakuliah" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Mata Kuliah :</label>
                                <input type="text" class="form-control" name="nama_matakuliah" id="nama_matakuliah">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">SKS :</label>
                                <input type="text" class="form-control" name="sks" id="sks">
                            </div>    
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div><p>

</div>

@endsection