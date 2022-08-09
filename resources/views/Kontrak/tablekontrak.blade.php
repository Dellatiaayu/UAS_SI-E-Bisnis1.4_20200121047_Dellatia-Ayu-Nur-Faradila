@extends("../../../Template/main")

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kontrak Mata Kuliah</h4>
                    <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontrak as $data )
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$data->mahasiswa->nama_mahasiswa}}</td>
                                    <td>{{$data->semester_id}}</td>
                                    <td>
                                        <div class="row">
                                        <button type="button" class="btn  btn-sm btn-primary mr-1" data-toggle="modal"
                                             data-target="#exampleModalEdit{{$data->id}}" data-whatever="@getbootstrap">
                                        <i class="fa fa-pencil color-muted m-r-5"></i> </button>
                                        <form action="/Kontrak/{{$data->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fa fa-close color-danger"></i> </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>    
                            </tbody>

                            <!-- Edit Kontrak -->
                            <div class="modal fade" id="exampleModalEdit{{$data->id}}" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kontrak Mata Kuliah </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="Kontrak/{{$data->id}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="mahasiswa_id" class="col-form-label">Nama Mahasiswa :</label>
                                                    <input type="text" class="form-control" id="mahasiswa_id" 
                                                    name="mahasiswa_id" value="{{$data->mahasiswa_id}}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Semester :</label>
                                                    <input type="text" class="form-control" name="semester_id" id="semester_id" value="{{$data->semester_id}}">
                                                </div>  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit Kontrak</button>
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

    <!-- Tambah Kontrak -->
    <div class="bootstrap-modal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
        data-whatever="@getbootstrap">Tambah Kontrak Mata Kuliah</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kontrak Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Kontrak" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Mahasiswa :</label>
                                <input type="text" class="form-control" name="mahasiswa_id" id="mahasiswa_id">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Semester :</label>
                                <input type="text" class="form-control" name="semester_id" id="semester_id">
                            </div>    
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Kontrak Mata Kuliah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><p>
</div>

@endsection