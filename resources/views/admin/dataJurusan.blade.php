@extends('template.app')

@section('content')
    {{-- <div class="section-header">
        <h1>Dashboard</h1>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">Jumlah jurusan ({{ $jurusan->count() }})</h4>
                    <div class="card-header-action">
                        <button type="button" class="btn btn-primary" id="modal-2"><i class="bi bi-plus-lg"> Tambah
                                data</i></button>
                    </div>
                </div>

                {{-- card table jurusan --}}
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        {{-- Perulangan Data jurusan --}}

                        {{-- Perhitungan data jurusan untuk media search --}}
                        @if ($jurusan->count())
                            @foreach ($jurusan as $item)
                                <li class="media">
                                    <div class="media-body">
                                        <a href="{{ route('kelas.jurusan.siswa.index', $item->kelas_id, $item->jurusan_id) }}"><h6 class="media-title text-center">{{ $item->nama_jurusan }}</h6></a>
                                    </div>
                                </li>

                                {{-- Form Edit jurusan --}}
                                <form class="modal-part" id="modal-edit-jurusan" method="POST" action=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="jurusan">
                                    <div class="form-group">
                                        <label>Nama jurusan</label>
                                        <input type="text" class="form-control" required name="name" id="name"
                                            value="">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                                {{-- /Form Edit jurusan --}}
                            @endforeach
                        @else
                            <p class="text-center">Tidak ada data.</p>
                        @endif

                        {{-- End Perulangan --}}

                        {{-- Form Tambah jurusan --}}
                        <form class="modal-part" id="modal-tambah-jurusan" method="POST"
                            action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role" value="jurusan">
                            <div class="form-group">
                                <label>Nama jurusan</label>
                                <input type="text" class="form-control" required name="name">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                        {{-- /Form Tambah jurusan --}}
                    </ul>
                </div>
                {{-- /end card --}}

            </div>
        </div>
    </div>
@endsection
