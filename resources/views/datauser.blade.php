@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="modal fade" id="tambahDataUser" tabindex="-1" aria-labelledby="tambahDataUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataUserLabel">Tambah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('data-user') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group mb-2">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group mb-2">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ubahDataUser" tabindex="-1" aria-labelledby="ubahDataUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahDataUserLabel">Tambah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('data-user') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group mb-2">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group mb-2">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h2 class="main-title my-auto">Data Pengguna</h2>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#tambahDataUser">
                    Tambah
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-stripped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->username }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    onclick="fungsiEdit('{{ $data->id }}|{{ $data->name }}|{{ $data->username }}|{{ $data->password }}|{{ $data->email }}')"
                                                    data-bs-toggle="modal" data-bs-target="#ubahDataUser">
                                                    <i class="fa fa-edit">Edit</i>
                                                </button>

                                                <form action="{{ url('data-user/' . $data->id) }}" class="d-inline"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                                        <i class="fa fa-trash">Hapus</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            function fungsiEdit(data) {
                var data = data.split('|');
                console.log(data);
                $('#ubahDataUser form').attr('action', "{{ url('data-user') }}/" + data[0]);
                $('#ubahDataUser .modal-body #name').val(data[1]);
                $('#ubahDataUser .modal-body #username').val(data[2]);
                $('#ubahDataUser .modal-body #email').val(data[4]);
                $('.selectpicker').selectpicker('refresh');
            }
        </script>
    @endsection
