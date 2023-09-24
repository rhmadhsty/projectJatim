@extends('template.app')

@section('content')
    {{-- <div class="card">
    <div class="card-header">
        <h4>The Bootstrap Way</h4>
    </div>
    <div class="card-body">
        <p class="mb-2">Use the Bootstrap method to create modal. You need to create
            an HTML structure for modal and the following button will trigger it.</p>
        <button class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModal">Aw, yeah!</button>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rekap Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6 ms-auto my-2">
                                <form action="{{ route('export_excel') }}" method="get">
                                    {{-- @csrf --}}
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="start_date">
                                        <input type="date" class="form-control" name="end_date">
                                        <button class="btn btn-primary" type="submit">GET</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">Kelas - Jurusan</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    {{-- <th class="text-center"><i class="bi bi-gear"></i></th> --}}
                                </tr>
                                {{-- Perulangan Data Siswa --}}
                                @if ($data->count())
                                    @foreach ($data as $item)
                                        {{-- @dd($item->absensiSiswa) --}}
                                        <tr>
                                            <td class="media text-center">
                                                <div class="media-body">
                                                    <h6 class="media-title">{{ $item->absensiSiswa->nama }}</h6>
                                                    <div class="text-small text-muted">{{ $item->absensiSiswa->nis }}
                                                    </div>
                                                    <span class="text-primary">{{ $item->email }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $item->absensiSiswa->siswaKelas->kelas }} - {{ $item->absensiSiswa->siswaKelas->jurusan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            {{-- <td class="text-center">
                                                <a type="button" class="btn btn-primary" id="tambah-kelas">Edit</a>
                                                <a type="button" class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#detailSiswa-{{ $item->siswa_id }}">Detail</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    <tr>
                                        {{-- <td>
                                            <a href="{{ route('export_excel') }}" class="btn btn-primary" onclick="tablesToExcel()"
                                                type="submit">Export-Excel</a>
                                        </td> --}}
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Ada Data Siswa.</td>
                                    </tr>
                                @endif
                                {{-- /Perulangan Data Siswa --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection
