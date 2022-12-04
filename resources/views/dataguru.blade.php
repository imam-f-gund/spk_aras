@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="modal fade" id="tambahDataGuru" tabindex="-1" aria-labelledby="tambahDataGuruLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataGuruLabel">Tambah Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('data-guru') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>

                            <div class="form-group mb-2">
                                <label for="pns_gtt">Golongan Pns</label>
                                <input type="text" class="form-control" id="pns_gtt" name="pns_gtt">
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

        <div class="modal fade" id="ubahDataGuru" tabindex="-1" aria-labelledby="ubahDataGuruLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahDataGuruLabel">Tambah Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('data-guru') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>

                            <div class="form-group mb-2">
                                <label for="pns_gtt">Golongan Pns</label>
                                <input type="text" class="form-control" id="pns_gtt" name="pns_gtt">
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
                <h2 class="main-title my-auto">Data Guru</h2>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#tambahDataGuru">
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
                                        <th>Golongan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $datas->nama }}</td>
                                            <td>{{ $datas->pns_gtt }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    onclick="fungsiEdit('{{ $datas->id }}|{{ $datas->nama }}|{{ $datas->pns_gtt }}')"
                                                    data-bs-toggle="modal" data-bs-target="#ubahDataGuru">
                                                    <i class="fa fa-edit">Edit</i>
                                                </button>

                                                <form action="{{ url('data-guru/' . $datas->id) }}" class="d-inline"
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
                $('#ubahDataGuru form').attr('action', "{{ url('data-guru') }}/" + data[0]);
                $('#ubahDataGuru .modal-body #nama').val(data[1]);
                $('#ubahDataGuru .modal-body #pns_gtt').val(data[2]);
                $('.selectpicker').selectpicker('refresh');
            }
        </script>
    @endsection
