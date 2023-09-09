@extends('admin.dataKelas')

@section('get')
    <div class="col-lg-8">
        <div class="tab-content no-padding" id="myTab2Content">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kelas </h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <button type="button" class="btn btn-primary" id="tambah-siswa"><i
                                            class="bi bi-plus-lg"> Tambah
                                            data</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">NIS</th>
                            </tr>
                            {{-- Perulangan Data Siswa --}}
                            @if ($siswa->count())
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->NIS }}</td>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                                {{-- Form Tambah Data Siswa --}}
                                <form class="modal-part" id="modal-siswa" method="POST"
                                    action="{{ route('data_kelas.getData.store', $item->kelas_id ? $item->kelas_id : 1) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kelas_id" value="{{ $item->kelas_id }}">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" class="form-control" required name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control" required name="NIS">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Tambah Data</button>
                                </form>
                                {{-- /End Form Tambah Data Siswa --}}
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">Tidak Ada Data Siswa.</td>
                                </tr>
                            @endif
                            {{-- /Perulangan Data Siswa --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
