@extends("../../../Template/main")

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Mahasiswa</h4><p>
                    <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No.Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mhs as $data )
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$data->nama_mahasiswa}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->no_tlp}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>
                                        <div class="row">
                                        <button type="button" class="btn  btn-sm btn-primary mr-1" data-toggle="modal"
                                             data-target="#exampleModalEdit{{$data->id}}" data-whatever="@getbootstrap">
                                        <i class="fa fa-pencil color-muted m-r-5"></i> </button>
                                        <form action="/Mahasiswa/{{$data->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fa fa-close color-danger"></i> </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>

                            <!-- Edit Mahasiswa -->
                            <div class="modal fade" id="exampleModalEdit{{$data->id}}" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="Mahasiswa/{{$data->id}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nama_mahasiswa" class="col-form-label">Nama Mahasiswa :</label>
                                                    <input type="text" class="form-control" id="nama_mahasiswa" 
                                                    name="nama_mahasiswa" value="{{$data->nama_mahasiswa}}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Alamat :</label>
                                                    <textarea class="form-control" name="alamat" id="alamat" >{{$data->alamat}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">No.Telepon :</label>
                                                    <input type="text" class="form-control" name="no_tlp" id="no_tlp" value="{{$data->no_tlp}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email :</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="{{$data->email}}">
                                                </div>  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit Mahasiswa</button>
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

    <!-- Tambah Mahasiswa -->
    <div class="bootstrap-modal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
        data-whatever="@getbootstrap">Tambah Mahasiswa</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Mahasiswa" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Mahasiswa :</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Alamat :</label>
                                <textarea class="form-control" name="alamat" id="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">No.Telepon :</label>
                                <input type="text" class="form-control" name="no_tlp" id="no_tlp">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email :</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>    
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><p>
</div>

@endsection