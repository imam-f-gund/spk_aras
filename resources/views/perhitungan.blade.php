@extends('layouts.app')

@section('content')
    @if (empty($periode_pilihan))
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2 class="my-auto">Periode Perhitungan</h2>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                @foreach ($periode as $item)
                    <a href="{{ url('perhitungan/' . $item->id) }}" class="text-decoration-none d-inline col-3 mb-3">
                        <div class="card">
                            <div class="card-bpdy p-5 text-center">
                                <h3>{{ $item->nama_periode }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @else
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2 class="main-title my-auto">Periode {{ $periode_pilihan->nama_periode }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>Bobot Kriteria</h5>
                            </div>
                            <div class="mx-auto">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-light">Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th class="text-center">{{ $item->kode_kriteria }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="bg-primary text-light">Bobot</th>
                                            @foreach ($kriteria as $item)
                                                <td class="text-center">{{ $item->bobot->nilai_roc }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th class="bg-primary text-light">Tipe</th>
                                            @foreach ($kriteria as $item)
                                                <td class="text-center">{{ $item->keterangan }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>Mencari Nilai Optimum (A0)</h5>
                            </div>
                            <hr>
                            <div class="w-100 d-inline">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th class="text-center">{{ $item->kode_kriteria }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">A0</td>
                                            @foreach ($kriteria as $item)
                                                <td class="text-center">{{ $item->nilai_max }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>Normalisasi Kriteria</h5>
                            </div>
                            <hr>
                            <div class="w-100 d-inline">
                                <table class="dataTablePerhitungan table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th class="text-center">{{ $item->kode_kriteria }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">A0</td>
                                            @foreach ($kriteria as $item)
                                                <td class="text-center">{{ $item->normalisasi_kriteria }}</td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hasil_nilai as $item)
                                            <tr>
                                                <td class="text-center">A{{ $loop->iteration }}</td>
                                                @foreach ($item->nilai_perhitungan as $np)
                                                    <td class="text-center">{{ $np->normalisasi_kriteria }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>Normalisasi Terbobot</h5>
                            </div>
                            <hr>
                            <div class="w-100 d-inline">
                                <table class="dataTablePerhitungan table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th class="text-center">{{ $item->kode_kriteria }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">A0</td>
                                            @foreach ($kriteria as $item)
                                                <td class="text-center">{{ $item->normalisasi_terbobot }}</td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hasil_nilai as $item)
                                            <tr>
                                                <td class="text-center">A{{ $loop->iteration }}</td>
                                                @foreach ($item->nilai_perhitungan as $np)
                                                    <td class="text-center">{{ $np->normalisasi_bobot }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>Nilai Ultimate Si dan Ki</h5>
                            </div>
                            <hr>
                            <div class="w-100 d-inline">
                                <table class="dataTablePerhitungan table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Alternatif</th>
                                            <th class="text-center">Si</th>
                                            <th class="text-center">Ki</th>
                                            <th class="text-center">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">A0</td>
                                            <td class="text-center">{{ $a0_si }}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach ($hasil_perhitungan as $item)
                                            <tr>
                                                <td class="text-center">A{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->si }}</td>
                                                <td class="text-center">{{ $item->ki }}</td>
                                                <td class="text-center">{{ $item->rank }}</td>
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
    @endif
@endsection

@section('script')
@endsection
