@extends("../../../Template/main")

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jadwal</h4>
                    <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jadwal</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $data )
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$data->jadwal}}</td>
                                    <td>{{$data->matakuliah_id}}</td>
                                    <td>
                                        <div class="row">
                                        <button type="button" class="btn  btn-sm btn-primary mr-1" data-toggle="modal"
                                             data-target="#exampleModalEdit{{$data->id}}" data-whatever="@getbootstrap">
                                        <i class="fa fa-pencil color-muted m-r-5"></i> </button>
                                        <form action="/Jadwal/{{$data->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fa fa-close color-danger"></i> </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>

                            <!-- Edit Jadwal -->
                            <div class="modal fade" id="exampleModalEdit{{$data->id}}" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="Jadwal/{{$data->id}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="jadwal" class="col-form-label">Jadwal :</label>
                                                    <input type="date" class="form-control" id="jadwal" 
                                                    name="jadwal" value="{{$data->jadwal}}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Mata Kuliah :</label>
                                                    <input type="text" class="form-control" name="matakuliah_id" 
                                                    id="matakuliah_id" value="{{$data->matakuliah_id}}">
                                                </div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit Jadwal</button>
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

    <!-- Tambah Jadwal -->
    <div class="bootstrap-modal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
        data-whatever="@getbootstrap">Tambah Jadwal</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Jadwal" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jadwal :</label>
                                <input type="date" class="form-control" name="jadwal" id="jadwal">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mata Kuliah</label>
                                <input type="text" class="form-control" name="matakuliah_id" id="matakuliah_id">
                            </div>   
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><p>
</div>

@endsection