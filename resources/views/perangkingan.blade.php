@extends('layouts.app')

@section('content')
    @if (empty($periode_pilihan))
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2 class="my-auto">Periode Perangkingan</h2>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                @foreach ($periode as $item)
                    <a href="{{ url('perangkingan/' . $item->id) }}" class="text-decoration-none d-inline col-3 mb-3">
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
                                <h5>Hasil Perankingan</h5>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Guru</th>
                                            <th class="text-center">Si</th>
                                            <th class="text-center">Ki</th>
                                            <th class="text-center">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasil_perhitungan as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->guru->nama }}</td>
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
                <hr>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center my-4">
                                <h4 class="fw-bold">Hasil Rekomendasi Guru Terbaik</h4>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead class="bg-primary text-light">
                                        <tr>
                                            <th class="text-center">Nama Guru</th>
                                            <th class="text-center">Rank</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasil_perangkingan as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->guru->nama }}</td>
                                                <td class="text-center">{{ $item->rank }}</td>
                                                <td class="text-center">{{ $item->ki }}</td>
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
