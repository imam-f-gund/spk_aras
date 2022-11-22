@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="main-title">Data Kriteria</h2>

        <div class="modal fade" id="tambahDataKriteria" tabindex="-1" aria-labelledby="tambahDataKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataKriteriaLabel">Tambah Data Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{ url('data-kriteria') }}" method="POST">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode_kriteria">Kode Kriteria</label>
                                <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria">
                            </div>
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ubahDataKriteria" tabindex="-1" aria-labelledby="ubahDataKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahDataKriteriaLabel">Tambah Data Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{ url('data-kriteria') }}" method="POST">
                            @csrf
                            @method('PUT')
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="kode_kriteria">Kode Kriteria</label>
                                <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria">
                            </div>
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#tambahDataKriteria" >
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
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kriteria as $datas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $datas->kode_kriteria }}</td>
                                            <td>{{ $datas->nama_kriteria }}</td>
                                            <td>{{ $datas->keterangan }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    onclick="fungsiEdit('{{ $datas->id }}|{{ $datas->kode_kriteria }}|{{ $datas->nama_kriteria }}|{{ $datas->keterangan }}')"
                                                    data-bs-toggle="modal" data-bs-target="#ubahDataKriteria">
                                                    <i class="fa fa-edit">Edit</i>
                                                </button>

                                                <form action="{{ url('data-kriteria/' . $datas->id) }}" class="d-inline"
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
            $('#ubahDataKriteria form').attr('action', "{{ url('data-kriteria') }}/" + data[0]);
            $('#ubahDataKriteria .modal-body #kode_kriteria').val(data[1]);
            $('#ubahDataKriteria .modal-body #nama_kriteria').val(data[2]);
            $('#ubahDataKriteria .modal-body #keterangan').val(data[2]);
            $('.selectpicker').selectpicker('refresh');
        }
    </script>
    @endsection
